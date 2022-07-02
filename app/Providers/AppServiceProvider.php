<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway (
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'fhrwp5fvc2675bd9',
                    'publicKey' => 'sr645b7n3hf4pf4q',
                    'privateKey' => '0c6db32e0c87fee5229c43f2c3b599d6',
                ]
            );
        });
    }

    // $gateway = new Braintree\Gateway([
    //     'environment' => 'sandbox',
    //     'merchantId' => 'd5p5v68sp25kr37b',
    //     'publicKey' => 'dwqhtjyrtywsnhvw',
    //     'privateKey' => 'd2251f7b217e2680e54ef4beb6ab4512'
    // ]);
}
