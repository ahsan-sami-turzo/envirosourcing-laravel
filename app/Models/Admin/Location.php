<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name','color','slug','status'
    ];
}
