<?php

namespace App\Services;

use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageCategory;
use Illuminate\Support\Facades\Auth;

class ArticleCategoryService
{
    use HandleUpload, ManageCategory;

    /**
     * Specify Category type
     */
    protected $categoryType = 'article';

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
        return public_path(env('UPLOAD_DIR_ARTICLE', 'media/images/articles'));
    }
}
