<?php

namespace App\Providers;

use App\Billing\MobileBankingPayment;
use App\Billing\PaymentGatewayContract;
use App\Billing\TelebirrPaymentGateway;
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
        $this->app->singleton(PaymentGatewayContract::class, function($app){
            if(request()->has('telebirr')){
                return new TelebirrPaymentGateway('ETB');
            }
            return new MobileBankingPayment('USD');
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
