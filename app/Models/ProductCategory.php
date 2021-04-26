<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function childCategories()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
