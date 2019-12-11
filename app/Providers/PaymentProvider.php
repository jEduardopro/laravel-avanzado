<?php

namespace App\Providers;

use App\Models\Paypal;
use Illuminate\Support\ServiceProvider;

class PaymentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Paypal::class, function($app){
            return new Paypal(env('PAYPAL_ID'), env('PAYPAL_SECRET'));
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
