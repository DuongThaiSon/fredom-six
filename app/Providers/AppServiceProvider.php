<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use Optix\Media\Facades\Conversion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Blade;

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

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        Blade::directive('importantfield', function ($expression) {
            return "<?= '<span class=text-danger>*</span>' ?>";
        });
    }
}
