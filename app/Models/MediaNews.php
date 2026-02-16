<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaNews extends Model
{
    protected $table = 'media_news';

    protected $fillable = [
        'title',
        'type',
        'published_at',
        'body',
        'external_url',
        'image_path',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }
}
