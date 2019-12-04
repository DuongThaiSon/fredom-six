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
    private function getSubMenus($parent_id, $ignore_id=null)
    {
        $menuCats = Menu::where('parent_id', $parent_id)
            ->where('category_id', 11)
            ->where('id', '<>', $ignore_id)
            ->orderBy('order')
            ->get()
            ->map(function($query) use($ignore_id) {
                $query->sub = $this->getSubMenus($query->id, $ignore_id);
                return $query;
                // print_r($query);die;
            });
            // print_r($menuCats);die;

        return $menuCats;
    }
    public function compose(View $view)
    {
        $logo = Component::find(6);
        $hotline = Setting::firstOrFail();
        // $menuTop = Menu::with('categories')->where([['category_id', 11], ['parent_id', 0]])->orderBy('order')->get();
        $menuTop = $this->getSubMenus(0);

        $view->with(compact('menuTop', 'hotline', 'logo'));
    }
}