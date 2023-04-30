<?php

namespace App\Models;

use App\Models\Admin\SisterConcern;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_image',
        'product_description',
        'sisterconcern_id',
        'category_id',
        'slug',
        'featured',
        'status',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id')->distinct();
    }
    public function company()
    {
        return $this->belongsTo(SisterConcern::class,'sisterconcern_id','id');
    }


    public function newCate()
    {
        return $this->hasMany(Category::class,'category_id','category_id');

    }


}
