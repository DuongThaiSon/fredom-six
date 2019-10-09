<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        $this->belongsTo('App\Models\User', 'created_by');
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
