<?php

namespace App\Http\View\Composers;

use App\Models\SeoTool;
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
        $scripts = SeoTool::get();
        $view->with(compact('scripts'));
    }
}
