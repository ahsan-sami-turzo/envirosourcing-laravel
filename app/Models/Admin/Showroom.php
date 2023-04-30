<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = [
        'showrooms_image',
        'title',
        'description',
        'slug',
        'status',
    ];
}
