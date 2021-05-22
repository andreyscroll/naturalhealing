<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer([
            'product.index',
            'product.category',
            'product.product',
            'page',
            'search'
        ], function ($view) {
            $view->with('categories', ProductCategory::select('name', 'slug')->where('parent_id', 0)->get());
            $view->with('pages', Page::select('name', 'slug')->get());
        });
    }
}
