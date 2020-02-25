<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_public' => 'boolean'
    ];
}
