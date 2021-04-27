<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Страница категории
     */
    public function show($slug)
    {
        //Для меню
        //$categories = ProductCategory::where('parent_id', 0)->get();

        //загружаем запрошенную категорию
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        // если parent_id != 0 значит категория дочерняя
        if($category->parent_id)
        {
            //подгрузить все соседние категории (с тем же parent_id что и текущая)
            $childCategories = ProductCategory::where('parent_id', $category->parent_id)->get();
            //подгрузить все товары этой категории
            $products = $category->products;

        } else {
            // подгрузить все дочерние категории
            $childCategories = $category->childCategories;
            // ids всех дочерних категорий
            $ids = $childCategories->pluck('id');
            //подгрузить все товары дочерних категорий
            $products = Product::whereIn('product_category_id', $ids)->get();
        }

        return view('product.category', compact('category', 'childCategories', 'products'));

    }
}
