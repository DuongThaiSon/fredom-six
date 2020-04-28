<?php

namespace App\Http\ViewComposers;

use Cart;
use Illuminate\View\View;
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
        
        $cart = Cart::getContent();
        $quantity = count($cart);
        $view->with(compact('quantity'));
    }
}