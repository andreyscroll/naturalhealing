<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'q' => 'required|string',
        ]);

        $searchKey = $request->input('q');
        $searchData = Product::where('title', 'LIKE', "%{$searchKey}%")->get();

        return view('search', compact('searchData', 'searchKey'));
    }
}
