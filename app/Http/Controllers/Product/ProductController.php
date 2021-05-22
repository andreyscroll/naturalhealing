<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Страница всех товаров
     *
     */
    public function index()
    {
        $products = Product::limit(12)->get();
        return view('product.index', compact('products'));
    }

    /**
     * Страница товара
     *
     */
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        $randomProducts = Product::where('product_category_id', $product->category->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('product.product', compact('product', 'randomProducts'));
    }
}
