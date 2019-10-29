<?php

namespace App\Http\Services;

use App\Http\Services\Traits\CategoryTrait;
use App\Http\Services\Traits\HandleButtonDisplay;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\RequestDataEdit;
use App\Http\Services\Traits\HandleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Auth;

class ProductService
{
    use CategoryTrait;

    /**
    * Specify Category type
    */
    protected $categoryType = 'product';

    private $attributes = [
        'name',
        'category_id',
        'meta_title',
        'slug',
        'meta_description',
        'meta_keyword',
        'meta_page_topic',
        'avatar',
        'description',
        'detail',
        'is_new',
        'is_public',
        'is_highlight'
    ];
}
