<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    protected $casts = [
        'is_public' => 'boolean',
        'is_highlight' => 'boolean',
        'is_new' => 'boolean',
    ];
}
