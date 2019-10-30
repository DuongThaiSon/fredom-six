<?php

namespace App\Http\Services\Traits;

use Optix\Media\MediaUploader;

trait HandleUpload
{
    public function uploadImage($file)
    {
        if ($file->isValid()) {
            $destinationPath = public_path($this->destinationUploadDir); // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = uniqid("leotive") . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            return $fileName;
        }
    }
}
