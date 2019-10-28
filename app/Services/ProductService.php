<?php

namespace App\Services;

use App\Services\Traits\CategoryTrait;
use App\Services\Base\BaseModel;
use App\Models\Category;

class ProductService extends BaseModel
{
    use CategoryTrait;

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
    * Specify Category type
    */
    protected $categoryType = 'product';
}
