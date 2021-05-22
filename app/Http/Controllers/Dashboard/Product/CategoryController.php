<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::with('parent')->get();
        return view('dashboard.product.category.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('dashboard.product.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->input();
        ProductCategory::whereKey($id)->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
        return back()->with('success', 'Категория обновлена');
    }
}
