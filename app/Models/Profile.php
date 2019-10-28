<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsToMany('App/Models/User')
        ->withPivot('value')
        ->withTimestamps();
    }
}
