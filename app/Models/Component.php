<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = ['id'];
    
	public function comCreatedBy() {
        return $this->belongsTo('App\Models\User', 'created_by');
	}
}
