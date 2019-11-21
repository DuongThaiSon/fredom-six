<?php

namespace App\Http\Services;

use App\Http\Services\Base\BaseModel;
use App\Http\Services\Traits\CategoryTrait;
use App\Http\Services\Traits\GetUploadPathTrait;
use App\Http\Services\Traits\HandleButtonDisplay;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\RequestDataEdit;
use App\Http\Services\Traits\HandleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Product;
use Auth;

class ProductService extends BaseModel
{
    use CategoryTrait, RequestDataCreate, HandleUpload, RequestDataEdit;
    use GetUploadPathTrait;

    /**
    * Specify Category type
    */
    protected $categoryType = 'product';
     /**
     * Determine resource type is category is not
     */

    protected $isCategory = false;
     /**
     * Specify input attributes
     */
    private $attributes = [
        'name',
        'category_id',
        'meta_title',
        'slug',
        'size_chart',
        'meta_description',
        'meta_keyword',
        'meta_page_topic',
        'avatar',
        'description',
        'detail',
        'is_new',
        'is_public',
        'is_highlight',
        'price',
        'discount',
        'discount_start',
        'discount_end',
        'unit',
        'product_code',
        'quantity'
    ];

    /**
     * Specify media upload directory
     */
    protected function destinationUploadDir()
    {
        return env('UPLOAD_DIR_PRODUCT', 'media/images/products');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function productCreate($attributes)
    {
        $attributes = collect($attributes)->only($this->attributes)->toArray();
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['is_public'] = array_key_exists('is_public', $attributes)?'1':'0';
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes)?'1':'0';
        $attributes['is_new'] = array_key_exists('is_new', $attributes)?'1':'0';
        $attributes['order'] = $this->model->max('order') + 1;
        if (!$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while ($this->model->where('slug', $slug)->get()->count() > 0) {
                $slug .= '-'.rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        if (array_key_exists('avatar', $attributes)) {
            $avatar = $this->uploadImage($attributes['avatar']);
            $attributes['avatar'] = $avatar;
        }

        return $attributes;
    }
}
