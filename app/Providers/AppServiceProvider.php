<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Brand;
use App\Category;
use App\Product;
use App\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('brand', Brand::all());
        view()->share('category', Category::all());
        view()->share('product', Product::all());
        view()->share('order', Order::orderBy('id', 'DESC')->paginate(4));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
