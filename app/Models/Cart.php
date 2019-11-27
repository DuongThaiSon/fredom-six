<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];
    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'ship');
    }
}
