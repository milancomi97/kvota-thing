<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
        'tip',
        'event_title',
        'event_content',
        'datum',
        'status',
        'moderator_id',
        'display_mode',
        'upload_enabled',
        'moderation_enabled',
        'upload_token',
        'tip',
        'event_code',
        'display_enabled',
        'external_gallery_url',
    ];

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    protected static function booted()
    {
        static::creating(function ($event) {
            $event->upload_token = Str::uuid(); // ili Str::random(32);
        });
    }

    /**
     * Vraća inline stil za pozadinski gradijent na osnovu tipa događaja.
     */
    public function gradientStyle(): string
    {
        return match ($this->tip) {
            'svadba'       => 'background: linear-gradient(to right, #ec4899, #ef4444);', // pink → crvena
            'krstenje'     => 'background: linear-gradient(to right, #f5f0e7, #e2d7c3);', // bež papir tonovi
            'punoletstvo'  => 'background: linear-gradient(to right, #8b5cf6, #4f46e5);', // ljubičasta
            default        => 'background: linear-gradient(to right, #8b5cf6, #4f46e5);',
        };
    }



}
