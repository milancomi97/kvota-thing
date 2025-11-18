<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('photos', function (Blueprint $t) {
            $t->string('local_path')->nullable()->after('filename'); // npr. photos-cache/krstenje-kruna/2025/09/16/...
            $t->index('local_path');
        });
    }
    public function down(): void {
        Schema::table('photos', function (Blueprint $t) {
            $t->dropIndex(['local_path']);
            $t->dropColumn('local_path');
        });
    }
};
//php artisan migrate --path=database/migrations/2025_09_16_200904_add_local_path_to_photos.php
