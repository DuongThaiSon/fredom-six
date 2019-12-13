<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Component;
use App\Models\Menu;
use App\Models\Setting;

class FooterComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $setting = Setting::first();
        $logo = Component::find(6);
        $bct = Component::find(5);
        $customer = Component::find(3);
        $workTime = Component::find(4);
        $showroom = Component::find(2);
        $office = Component::find(1);
        $menuOne = Menu::with('categories')->where([['category_id', 12], ['parent_id', 7]])->get();
        $menuTwo = Menu::with('categories')->where([['category_id', 12], ['parent_id', 15]])->get();
        $view->with(compact('office', 'menuOne', 'menuTwo', 'showroom', 'customer', 'workTime', 'bct', 'logo'));
    }
}
