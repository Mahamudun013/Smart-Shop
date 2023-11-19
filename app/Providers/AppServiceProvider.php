<?php

namespace App\Providers;

use App\Category;
use App\Customer;
use App\Order;
use Cart;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

         View::composer('frontEnd.includes.header',function($view){
            $publishedCategories=Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories);
        });

        View::composer('frontEnd.includes.menu',function($view){
            $cartItems=Cart::content()->count();
            $publishedCategories=Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories)->with('cartItems',$cartItems);
        });

        View::composer('frontEnd.includes.footer',function($view){
            $publishedCategories=Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories);
        });

        View::composer('admin.home.homeContent',function($view){
            $orders=Order::get()->all();
            $totalOrder=count($orders);

            $customers=Customer::get()->all();
            $totalCustomer=count($customers);

            $view->with('totalOrder',$totalOrder)->with('totalCustomer',$totalCustomer);
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
