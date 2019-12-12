<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $guarded = ['id'];
    
	public function showroomCreatedBy() {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_showrooms')
        ->withTimestamps();
    }
}
