<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

    protected $perPage = 15;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    protected $casts = [
        'is_public' => 'boolean',
        'is_highlight' => 'boolean',
        'is_new' => 'boolean',
    ];
}
