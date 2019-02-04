<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IncomeServiceProvider extends ServiceProvider
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
            $view->with('income',\App\StockOut::where('product_status','Sell')->sum('total_price'));
        });
    }
}
