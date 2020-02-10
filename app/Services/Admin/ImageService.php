<?php

namespace App\Services\Admin;

use App\Models\Image;
use App\Services\Plugins\BaseModel;
use Illuminate\Support\Facades\Auth;

class ImageService extends BaseModel
{
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
     * Specify Model class name
     *
     * @return string
     */
    protected function model()
    {
        return Image::class;
    }

    /**
     * Exchange order of 2 entities
     *
     * @param $entities
     * @param $prefix
     * @return boolean
     */
    public function reorder($entities, $prefix = 'entry_')    {
        $ids = array();
        foreach ($entities as $entity) {
            $ids[] = str_replace($prefix, '', $entity);
        }
        $order = $this->model->find($ids)->sortByDesc('order')->pluck('order');
        foreach ($order as $key => $value) {
            $this->model->where('id', str_replace($prefix, '', $entities[$key]))->update(['order' => $value]);
        }

        return true;
    }

    /**
     * Update image caption
     *
     * @param $entity
     * @param $caption
     * @return boolean
     */
    public function updateCaption(Image $image, $caption)
    {
        $image->caption = $caption;
        $image->save();
        return true;
    }
}
