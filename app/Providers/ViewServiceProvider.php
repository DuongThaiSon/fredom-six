<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('client.layouts.header', 'App\Http\ViewComposers\HeaderComposer');
        View::composer('client.layouts.footer', 'App\Http\ViewComposers\FooterComposer');
    }
}
