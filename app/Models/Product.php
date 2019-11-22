<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category')
        ->withTimestamps();
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function productAttributeValues()
    {
        return $this->belongsToMany('App\Models\ProductAttributeValue', 'product_attribute_value', 'product_id', 'product_attribute_value_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'likes');
    }
}


