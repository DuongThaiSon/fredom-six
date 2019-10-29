<?php

namespace App\Http\Services;

use App\Http\Services\Base\BaseModel;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\CategoryTrait;
use App\Http\Services\Traits\HandleUpload;
use App\Models\Category;
use Auth;

class ProductCategoryService extends BaseModel
{
    use CategoryTrait, RequestDataCreate, HandleUpload;

    /**
    * Specify Category type
    */
    protected $categoryType = 'product';

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Specify input attributes
     */
    protected $attributes = [
        'name',
        'parent_id',
        'is_public',
        'meta_title',
        'slug',
        'meta_description',
        'meta_keyword',
        'meta_page_topic',
        'avatar',
        'description',
        'type'
    ];

    /**
     * Specify media upload directory
     */
    protected $destinationUploadDir = 'media/product';

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
