<?php

namespace App\Services\Admin;

use App\Models\Article;
use App\Services\Plugins\BaseModel;
use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageItem;
use Illuminate\Support\Facades\Auth;

class ArticleService extends BaseModel
{
    use HandleUpload, ManageItem;

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

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }
}
