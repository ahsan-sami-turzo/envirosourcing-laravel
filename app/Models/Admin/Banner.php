<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title' ,
        'sub_title',
        'description',
        'banner_image',
        'status',
        'slug'
    ];
}
