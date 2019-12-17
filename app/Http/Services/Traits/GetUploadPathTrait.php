<?php

namespace App\Http\Services\Traits;

trait GetUploadPathTrait
{
    public function getDestinationUploadDir()
    {
        if (method_exists($this, 'destinationUploadDir')) {
            return $this->destinationUploadDir();
        }

        return property_exists($this, 'destinationUploadDir') ? $this->destinationUploadDir : 'media';
    }
}
