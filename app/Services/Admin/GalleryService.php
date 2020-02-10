<?php

namespace App\Services\Admin;

use App\Models\Gallery;
use App\Services\Plugins\BaseModel;
use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageItem;
use Illuminate\Support\Facades\Auth;

class GalleryService extends BaseModel
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
        return public_path(env('UPLOAD_DIR_GALLERY', 'media/images/galleries'));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Gallery::class;
    }

    public function processImage($image, Gallery $gallery)
    {
        if ($imageName = $this->uploadImage($image, $this->destinationUploadDir())) {
            $currentOrder = \App\Models\Image::max('order');
            $gallery->images()->create([
                'name' => $imageName,
                'size' => $image->getClientSize(),
                'mime' => $image->getClientMimeType(),
                'order' => $currentOrder ? $currentOrder + 1 : 1,
                'created_by' => $this->guard()->id(),
                'updated_by' => $this->guard()->id()
            ]);
        }
    }

    public function revertImage(Image $image)
    {
        $fileName = $image->name;
        if (file_exists($this->destinationUploadDir().'/'.$fileName)) {
            unlink($this->destinationUploadDir().'/'.$fileName);
        }
        $image->delete();
    }
}
