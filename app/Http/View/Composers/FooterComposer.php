<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Component;
use App\Models\Menu;

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
        $customer = Component::where('id', 3)->firstOrFail();
        $workTime = Component::where('id', 4)->firstOrFail();
        $showroom = Component::where('id', 2)->firstOrFail();
        $office = Component::where('id', 1)->firstOrFail();
        $menuOne = Menu::with('categories')->where([['category_id', 12], ['parent_id', 7]])->simplePaginate();
        $menuTwo = Menu::with('categories')->where([['category_id', 12], ['parent_id', 15]])->simplePaginate();
        $view->with(compact('office', 'menuOne', 'menuTwo', 'showroom', 'customer', 'workTime'));
    }
}