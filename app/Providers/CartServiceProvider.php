<?php

namespace App\Providers;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CookieRepository;
use App\Repositories\Cart\DatabaseRepository;
use App\Repositories\Cart\SessionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //عشان نحدد الداتا جاية من وين وبناء عليها استدعي الريبو الي بحتاجه
 
        $this->app->bind(CartRepository::class, function($app) {
            if (config('cart.driver') == 'cookie') {
                return new CookieRepository();
            }
            if (config('cart.driver') == 'session') {
                return new SessionRepository();
            }

            return new DatabaseRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
