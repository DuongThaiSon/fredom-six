<?php

namespace App\Services\Admin;

use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageUser;

class AdminService
{
    use HandleUpload, ManageUser;

    /**
     * Specify User type
     */
    protected $userType = 'admin';

    /**
     * Specify the upload directory
     */
    protected function destinationUploadDir()
    {
        return public_path(env('UPLOAD_DIR_USER', 'media/images/users'));
    }
}
