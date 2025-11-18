<?php

namespace App\Jobs;

use App\Models\Photo;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UploadPhotoToDrive implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 5;     // retry do 5 puta
    public int $timeout = 900;   // 15 min

    public function __construct(
        public int $photoId
    ) {}

    public function backoff(): array
    {
        // blagi eksponencijalni backoff protiv Drive throttle-a
        return [2, 5, 15, 30, 60];
    }

    public function handle(): void
    {
        Log::info("UploadJob start", ['photo_id' => $this->photoId]);

        $photo = Photo::findOrFail($this->photoId);
        $event = Event::findOrFail($photo->event_id);

        // mora postojati lokalna kopija
        if (!$photo->local_path || !Storage::disk('local')->exists($photo->local_path)) {
            Log::warning('Local file missing for job', ['photo_id'=>$photo->id, 'local'=>$photo->local_path]);
            return;
        }

        $localAbs = storage_path('app/'.$photo->local_path);
        $eventSlug = Str::slug($event->naziv) ?: 'event';
        $driveFolder = $event->drive_folder_id ?: $eventSlug;

        // odredi ime fajla na Drive-u (zadrži postojeće ime iz local_path)
        $basename = basename($photo->local_path); // npr. 20250916_120300_ab12cd.jpg

        $google = Storage::disk('google');

        $stream = fopen($localAbs, 'r');
        try {
            $drivePath = $google->putFileAs($driveFolder, $localAbs, $basename);

            // ažuriraj Photo: sada znamo drive filename
            $photo->update([
                'filename' => $drivePath ?: "{$driveFolder}/{$basename}",
                'approved' => true,
                'visible'  => true,
            ]);

            Log::info('Photo uploaded to Drive', [
                'photo_id' => $photo->id,
                'event_id' => $event->id,
                'filename' => $photo->filename,
            ]);
        } catch (\Throwable $e) {
            Log::error('Drive upload failed', [
                'photo_id' => $photo->id,
                'err'      => $e->getMessage(),
            ]);
            throw $e; // retry
        } finally {
            if (is_resource($stream)) fclose($stream);
        }

        // nakon uspeha: pokušaj da očistiš lokalni cache na max 50 fajlova (globalno)
        $this->pruneLocalCache(maxCount: 50);
        Log::info("UploadJob done", ['photo_id' => $this->photoId]);

    }

    /**
     * LRU prune: ostavi najskorijih $maxCount fajlova po mtime; obriši sve ostale.
     * Radi globalno nad storage/app/photos-cache (rekurzivno).
     */
    protected function pruneLocalCache(int $maxCount): void
    {
        $cacheDir = storage_path('app/photos-cache');
        if (!is_dir($cacheDir)) return;

        // lock da više jobova ne briše u isto vreme
        $lock = Cache::lock('photos-cache-prune', 60);
        if (!$lock->get()) {
            // neko drugi čisti — preskoči
            return;
        }

        try {
            // rekurzivno skupi sve fajlove
            $rii = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($cacheDir, \FilesystemIterator::SKIP_DOTS)
            );

            $files = [];
            foreach ($rii as $fileInfo) {
                if ($fileInfo->isFile()) {
                    $files[] = [
                        'path' => $fileInfo->getPathname(),
                        'mtime'=> $fileInfo->getMTime(),
                    ];
                }
            }

            $count = count($files);
            if ($count <= $maxCount) return;

            // sortiraj po mtime DESC (najnoviji prvi)
            usort($files, fn($a,$b) => $b['mtime'] <=> $a['mtime']);

            // zadrži prvih $maxCount, ostalo obriši
            $toDelete = array_slice($files, $maxCount);
            $deleted = 0;
            foreach ($toDelete as $f) {
                // obrisi fajl, a prazne foldere posle (best-effort)
                if (@unlink($f['path'])) $deleted++;
            }

            // probaj da obrišeš prazne foldere (best-effort, nije kritično)
            $this->rmdirEmpty($cacheDir);

            Log::info('Local cache pruned', [
                'kept'    => $maxCount,
                'deleted' => $deleted,
            ]);
        } finally {
            optional($lock)->release();
        }
    }

    protected function rmdirEmpty(string $dir): void
    {
        $isEmpty = true;
        $items = scandir($dir);
        foreach ($items ?: [] as $item) {
            if ($item === '.' || $item === '..') continue;
            $path = $dir.DIRECTORY_SEPARATOR.$item;
            if (is_dir($path)) {
                $this->rmdirEmpty($path);
                // posle rekurzije, pokušaj obrisati ako je prazan
                @rmdir($path);
            } else {
                $isEmpty = false;
            }
        }
    }
}
