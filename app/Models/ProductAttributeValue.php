<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductAttributeValue extends Model
{
    protected $guarded = ['id'];

    public function productAttribute()
    {
        return $this->belongsTo('App\Models\ProductAttribute');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_attribute_value', 'product_attribute_value_id', 'product_id');
    }
}
