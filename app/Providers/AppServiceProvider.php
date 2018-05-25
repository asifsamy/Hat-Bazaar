<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\SubCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('name', 'BITM');
        View::composer('*', function($view){  
            $publishedCategories = Category::where('publicationStatus', 1)->get();
            $view->with('publishedCategories', $publishedCategories);
//            $publishedSubCategories = SubCategory::where('publicationStatus', 1)->get();
//            $view->with('publishedSubCategories', $publishedSubCategories);
        });
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
