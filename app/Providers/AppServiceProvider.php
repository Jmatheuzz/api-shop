<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use App\Repositories\Cart\CartRepository;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Models\User;
use App\Repositories\User\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Cart\CartRepositoryInterface', 'App\Repositories\Cart\CartRepository');
        $this->app->bind('App\Repositories\Cart\CartRepositoryInterface', function(){
            return new CartRepository(new Cart());
        });

        $this->app->bind('App\Repositories\Product\ProductRepositoryInterface', 'App\Repositories\Product\ProductRepository');
        $this->app->bind('App\Repositories\Product\ProductRepositoryInterface', function(){
            return new ProductRepository(new Product());
        });

        $this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\UserRepository');
        $this->app->bind('App\Repositories\User\UserRepositoryInterface', function(){
            return new UserRepository(new User());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
