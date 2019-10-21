<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailContent extends Model
{
    protected $guarded = ['id'];
    public function settinUpdateBy()
    {
        return $this->belongsTo('App\Models\User', 'update_by');
    }
}
