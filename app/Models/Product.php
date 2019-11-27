<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    const PRODUCT_TYPES = [
        'BASIC' => 'Basic',
        'DOWNLOADABLE' => 'Downloadable',
        'VARIABLE_PRODUCT' => 'Variable Product',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category')
        ->withTimestamps();
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function productAttributeOptions()
    {
        return $this->belongsToMany(ProductAttributeOption::class, 'product_attribute_values', 'product_id', 'product_attribute_option_id');
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

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function registerMediaGroups()
    {
        $this->addMediaGroup('gallery')
             ->performConversions('thumb');
    }

    public function attributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_attribute_value', 'product_id', 'product_attribute_id');
    }

    public function attributeProductValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
    
    public function variants()
    {
        return $this->belongsToMany(Product::class, 'product_attribute_values', 'product_id', 'variant_id')
            ->withTimestamps()
            ->orderBy('order', 'desc');
    }
}


