<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
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
        $hotline = Setting('hotline');
        $company_email = Setting('company_email');
        $sale = Setting('sale');
        $description = Setting('description');
        $contact = Setting('contact');
        $address = Setting('address');
        $position = Setting('position');
        $copyright = Setting('copyright');
        $working_time = Setting('working_time');
        $facebook = Setting('facebook');

        $view->with(compact('hotline', 'company_email', 'sale', 'contact', 'address', 'position', 'description', 'copyright', 'working_time', 'facebook'));
    }
}