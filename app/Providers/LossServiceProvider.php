<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LossServiceProvider extends ServiceProvider
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
            $view->with('loss',\App\StockOut::whereBetween('product_status',['Damage','Lost'])->sum('total_price'));
        });
    }
}
