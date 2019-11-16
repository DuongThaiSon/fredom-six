<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Component;
use App\Models\Menu;
use App\Models\Setting;

class HeaderComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $hotline = Setting::firstOrFail();
        $menuTop = Menu::with('categories')->where('category_id', 22)->get();
        $view->with(compact('menuTop', 'hotline'));
    }
}