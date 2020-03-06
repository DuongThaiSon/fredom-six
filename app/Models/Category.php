<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_public' => 'boolean',
        'is_highlight' => 'boolean',
        'is_new' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * Get the admin that last edited the category.
     */
    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_category')
        ->withTimestamps();
    }

    public function productAttributes()
    {
        return $this->belongsToMany('App\Models\ProductAttribute', 'product_category_attribute')
        ->withTimestamps();
    }
}
