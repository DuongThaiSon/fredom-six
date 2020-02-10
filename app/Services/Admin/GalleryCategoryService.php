<?php

namespace App\Services\Admin;

use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageCategory;
use Illuminate\Support\Facades\Auth;

class GalleryCategoryService
{
    use HandleUpload, ManageCategory;

    /**
	 * Specify Category type
	 */
	protected $categoryType = 'gallery';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Specify the upload directory
     */
    protected function destinationUploadDir()
    {
        return public_path(env('UPLOAD_DIR_GALLERY', 'media/images/galleries'));
    }
}
