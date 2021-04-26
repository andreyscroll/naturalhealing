<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'products'], function ()
{
    Route::get('/', [App\Http\Controllers\Product\ProductController::class, 'index'])->name('product.index');
    Route::get('/{slug}', [App\Http\Controllers\Product\ProductController::class, 'show'])->name('product.show');
    Route::get('/category/{slug}', [App\Http\Controllers\Product\CategoryController::class, 'show'])->name('product.category');
});

//Route::group(['prefix' => 'blog'], function ()
//{
//
//});

//Route::group(['prefix' => 'dashboard'], function ()
//{
//
//});

//Route::get('/login', [App\Http\Controllers\AuthController::class, 'show']);
//Route::post('/login', [App\Http\Controllers\AuthController::class, 'checkLogin']);
//Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
