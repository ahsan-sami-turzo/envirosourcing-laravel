<?php

namespace App\Models\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    protected $table = 'sisterconcern_category';
    protected $fillable = [
        'sisterconcern_id',
        'category_id',
        'product_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
