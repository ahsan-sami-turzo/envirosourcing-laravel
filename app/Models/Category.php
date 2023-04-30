<?php

namespace App\Models;

use App\Models\Admin\SisterConcern;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(SisterConcern::class, 'sisterconcern_id', 'id');
    }

    public function ownerProductsList()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('sisterconcern_id', 1);
    }

    public function ownerProducts()
    {
        return $this->ownerProductsList()->limit(4);
    }

    public function categoryProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->distinct();
    }

}
