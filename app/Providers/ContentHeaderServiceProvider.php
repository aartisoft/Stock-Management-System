<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContentHeaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('admin.layouts._contentHeader', function ($view) {
            $view->with('shop_name',\App\Setting::where('type','shop_name')->first());
        });
    }
}
