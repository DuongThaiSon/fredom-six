<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=['id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
