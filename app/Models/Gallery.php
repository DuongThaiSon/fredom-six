<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Optix\Media\HasMedia;

class Gallery extends Model
{
    use HasMedia;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function registerMediaGroups()
    {
        $this->addMediaGroup('gallery')
             ->performConversions('thumb');
    }
}
