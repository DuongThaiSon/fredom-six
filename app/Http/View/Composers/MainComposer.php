<?php

namespace App\Http\View\Composers;

use App\Models\SeoTool;
use App\Models\Setting;
use Illuminate\View\View;

class MainComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = Setting::first();
        $scripts = SeoTool::get();
        $view->with(compact('scripts', 'settings'));
    }
}
