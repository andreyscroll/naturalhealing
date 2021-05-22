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

Route::get('/', function () {
    return 'home';
})->name('home');

//Товары
Route::group(['prefix' => 'products'], function ()
{
    Route::get('/', [App\Http\Controllers\Product\ProductController::class, 'index'])->name('product.index');
    Route::get('/{slug}', [App\Http\Controllers\Product\ProductController::class, 'show'])->name('product.show');
    Route::get('/category/{slug}', [App\Http\Controllers\Product\CategoryController::class, 'show'])->name('product.category');
});

//Админка
Route::group(['prefix' => 'dashboard'], function ()
{
    Route::get('/', [App\Http\Controllers\Dashboard\MainController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'products'], function()
    {
        //Маршруты товаров
        Route::get('/', [App\Http\Controllers\Dashboard\Product\ProductController::class, 'index'])
            ->name('dashboard.product.index');
        Route::get('/{id}/edit', [App\Http\Controllers\Dashboard\Product\ProductController::class, 'edit'])
            ->name('dashboard.product.edit');
        Route::put('/{id}', [App\Http\Controllers\Dashboard\Product\ProductController::class, 'update'])
            ->name('dashboard.product.update');

        //Категории товаров
        Route::get('/categories', [App\Http\Controllers\Dashboard\Product\CategoryController::class, 'index'])
            ->name('dashboard.product.category.index');
        Route::get('/category/{id}/edit', [App\Http\Controllers\Dashboard\Product\CategoryController::class, 'edit'])
            ->name('dashboard.product.category.edit');
        Route::put('/category/{id}', [App\Http\Controllers\Dashboard\Product\CategoryController::class, 'update'])
            ->name('dashboard.product.category.update');
    });

    //Blog
    Route::resource('blog', App\Http\Controllers\Dashboard\Blog\BlogController::class)
        ->except(['show'])
        ->parameters(['blog' => 'id'])
        ->names([
            'index' => 'dashboard.blog.index',
            'create' => 'dashboard.blog.create',
            'store' => 'dashboard.blog.store',
            'edit' => 'dashboard.blog.edit',
            'update' => 'dashboard.blog.update',
            'destroy' => 'dashboard.blog.destroy'
        ]);


});

Route::get('/search', [App\Http\Controllers\SearchController::class, 'show'])->name('search.show');
Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');

//Route::group(['prefix' => 'blog'], function ()
//{
//    Route::get('/blog', [App\Http\Controllers\Blog\BlogController::class, 'index'])->name('blog.index');
//    Route::get('/blog/{slug}', [App\Http\Controllers\Blog\BlogController::class, 'index'])->name('blog.show');
//});



//Route::get('/login', [App\Http\Controllers\AuthController::class, 'show']);
//Route::post('/login', [App\Http\Controllers\AuthController::class, 'checkLogin']);
//Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
