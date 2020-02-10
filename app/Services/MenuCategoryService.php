<?php

namespace App\Services;

use App\Services\Plugins\ManageCategory;
use Illuminate\Support\Facades\Auth;

class MenuCategoryService
{
    use ManageCategory;

    /**
	 * Specify Category type
	 */
	protected $categoryType = 'menu';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
