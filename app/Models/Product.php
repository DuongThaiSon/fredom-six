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
}


