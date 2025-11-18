<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'filename', 'uploader_name', 'uploader_ip','local_path',
        'approved', 'visible',
    ];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
