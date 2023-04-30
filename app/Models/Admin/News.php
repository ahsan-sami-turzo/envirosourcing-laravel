<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'news_image',
        'type',
        'slug',
        'url',
        'link',
        'status'
    ];
}
