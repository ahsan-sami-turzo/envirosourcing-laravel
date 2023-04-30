<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'management_image',
        'slug',
        'status',

    ];
}
