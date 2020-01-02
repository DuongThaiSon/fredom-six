<?php

namespace App\Services\Plugins;

trait HandleUpload
{
    public function uploadFile($file, $destinationPath)
    {
        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $fileName = uniqid("leotive") . '.' . $extension; // renaming file
            $file->move($destinationPath, $fileName); // uploading file to given path
            return $fileName;
        }
    }

    public function getDestinationUploadDir()
    {
        if (method_exists($this, 'destinationUploadDir')) {
            return $this->destinationUploadDir();
        }

        return property_exists($this, 'destinationUploadDir') ? $this->destinationUploadDir : 'media';
    }
}
