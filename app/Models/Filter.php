<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'filter_category')
            ->whereCanFilter('1')
            ->withTimestamps();
    }
}
