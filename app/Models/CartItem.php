<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = ['id'];
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
