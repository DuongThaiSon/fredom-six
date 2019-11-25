<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductAttributeOption extends Model
{
    protected $guarded = ['id'];

    public function productAttribute()
    {
        return $this->belongsTo('App\Models\ProductAttribute');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_attribute_values', 'product_attribute_option_id', 'product_id');
    }
}
