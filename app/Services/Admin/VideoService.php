<?php

namespace App\Services\Admin;

use App\Models\Video;
use App\Services\Plugins\BaseModel;
use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageItem;
use Illuminate\Support\Facades\Auth;

class VideoService extends BaseModel
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
        return public_path(env('UPLOAD_DIR_VIDEO', 'media/images/videos'));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Video::class;
    }
}
