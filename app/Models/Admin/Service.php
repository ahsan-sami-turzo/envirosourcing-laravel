<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'services_image',
        'title',
        'description',
        'slug',
        'status',

    ];
}
