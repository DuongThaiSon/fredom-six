<?php

namespace App\Services\Admin;

use App\Services\Plugins\HandleUpload;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    use HandleUpload;

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
        return public_path(env('UPLOAD_DIR_USER', 'media/images/users'));
    }

    public function get()
    {
        return $this->guard()->user();
    }

    public function update(array $attributes)
    {
        $user = $this->get();
        if (array_key_exists('avatar', $attributes) && !is_null($attributes['avatar'])) {
            $attributes['avatar'] = $this->uploadImageBase64($attributes['avatar'], $this->getDestinationUploadDir());
        } else {
            unset($attributes['avatar']);
        }
        $user->fill($attributes);
        $user->save();
        return true;
    }
}
