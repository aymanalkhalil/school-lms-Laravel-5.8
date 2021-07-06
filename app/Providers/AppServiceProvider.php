<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        Validator::extend('arabic', function ($attributes, $value, $parameters, $validation) {
            if(!preg_match("/\p{Arabic}/u", $value) ) {
                return false;
            }
            return true;
          },"من فضلك قم بكتابة بالغة العربية " );

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