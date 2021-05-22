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

        //загружаем запрошенную категорию
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        // если parent_id != 0 значит категория дочерняя
        if($category->parent_id)
        {
            //подгрузить все соседние категории (с тем же parent_id что и текущая)
            $children = ProductCategory::where('parent_id', $category->parent_id)->get();
            //подгрузить все товары этой категории
            $products = Product::where('product_category_id', $category->id)->simplePaginate(12);

        } else {
            // подгрузить все дочерние категории
            $children = $category->children;
            // ids всех дочерних категорий
            $ids = $children->pluck('id');
            //подгрузить все товары дочерних категорий
            $products = Product::whereIn('product_category_id', $ids)->simplePaginate(12);
        }

        return view('product.category', compact('category', 'children', 'products'));

    }
}
