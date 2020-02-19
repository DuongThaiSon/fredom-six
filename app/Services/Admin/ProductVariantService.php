<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class ProductVariantService
{
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }
}
