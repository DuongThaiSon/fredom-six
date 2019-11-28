<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded=['id'];
    public function carts()
    {
        return $this->hasMany('App\Models\Cart', 'ship');
    }
}
