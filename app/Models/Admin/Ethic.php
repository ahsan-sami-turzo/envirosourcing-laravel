<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ethic extends Model
{
    protected $fillable = [
        'title_one' ,
        'title_two',
        'title_three',
        'title_four',
        'subtitle_one',
        'subtitle_two',
        'subtitle_three',
        'ethics_image_one',
        'ethics_image_two',
        'ethics_image_three',
        'ethics_cover_image',
        'slug',
        'status'
    ];
}
