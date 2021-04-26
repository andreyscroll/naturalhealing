<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Страница всех товаров
     *
     */
    public function index()
    {
        $categories = ProductCategory::where('parent_id', 0)->get();
        $allProducts = Product::limit(5)->get();
        return view('product.index', compact('categories', 'allProducts'));
    }

    /**
     * Страница товара
     *
     */
    public function show($slug)
    {
        $categories = ProductCategory::where('parent_id', 0)->get();
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('product.product', compact('product', 'categories'));
    }
}
