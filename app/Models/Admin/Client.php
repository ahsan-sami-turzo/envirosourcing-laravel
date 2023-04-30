<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name' ,
        'clients_logo',
        'status',
        'slug'
    ];
}
