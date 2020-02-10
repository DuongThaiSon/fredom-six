<?php

namespace App\Services\Plugins;

use Intervention\Image\Facades\Image;

trait HandleUpload
{
    protected function uploadFile($file, $destinationPath)
    {
        $this->ensureDestinationDirectoryExists($destinationPath);

        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $fileName = uniqid("leotive") . '.' . $extension; // renaming file
            $file->move($destinationPath, $fileName); // uploading file to given path
            return $fileName;
        }
        return false;
    }

    protected function uploadImage($file, $destinationPath)
    {
        $this->ensureDestinationDirectoryExists($destinationPath);

        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $fileName = uniqid("leotive") . '.' . $extension; // renaming file
            $uploadImage = Image::make($file);
            $uploadImage->save($destinationPath.'/'.$fileName);
            return $fileName;
        }
        return false;
    }

    private function ensureDestinationDirectoryExists($destinationPath)
    {
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            $gitignore = '.gitignore';
            $text = "*\n!.gitignore\n";
            file_put_contents($destinationPath.'/'.$gitignore, $text);
        }
        return true;
    }

    protected function getDestinationUploadDir()
    {
        if (method_exists($this, 'destinationUploadDir')) {
            return $this->destinationUploadDir();
        }

        return property_exists($this, 'destinationUploadDir') ? $this->destinationUploadDir : 'media';
    }
}
