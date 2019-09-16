<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart', 'id');
    }
}
