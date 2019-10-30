<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function subCat()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
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
        return $this->belongsToMany('App\Models\Category', 'product_category')
        ->withTimestamps();
    }
}
