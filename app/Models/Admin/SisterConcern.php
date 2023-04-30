<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class SisterConcern extends Model
{
    const OWNER = 100;
    const ORTHER = 101;

    protected $table = 'sisterconcerns';
    protected $fillable = [
        'company_name',
        'company_logo',
        'company_cover_image',
        'company_title_one',
        'company_description_one',
        'company_title_two',
        'company_description_two',
        'company_title_three',
        'company_description_three',
        'company_title_four',
        'company_description_four',
        'address',
        'type',
        'slug',
        'status',

    ];

    public function products()
    {
        return $this->hasMany(Product::class,'sisterconcern_id','id');
    }

    public function companyCategories()
    {
        return $this->belongsToMany(Category::class,'sisterconcern_category','sisterconcern_id','category_id')->distinct();
    }

    public function featureProducts()
    {
        return $this->hasMany(Product::class,'sisterconcern_id','id')->where('featured',1)->limit(6)->latest();
    }





}
