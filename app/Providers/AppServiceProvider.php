<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use Optix\Media\Facades\Conversion;

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
        \Schema::defaultStringLength(191);
        // register thumbnail image on upload
        Conversion::register('thumb', function (Image $image) {
            return $image->fit(64, 64);
        });

        \View::composer(
            'client.layouts.footer.footer', 'App\Http\View\Composers\FooterComposer'
        );
        \View::composer(
            'client.layouts.header.header', 'App\Http\View\Composers\HeaderComposer'
        );
    }
}
