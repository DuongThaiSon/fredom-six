<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function cart_item()
    {
        return $this->hasMany('App\Models\Cart_item', 'cart_id', 'id');
    }
}
