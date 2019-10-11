<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name', 'detail'];
    
	public function comCreatedBy() {
        return $this->belongsTo('App\Models\User', 'created_by');
	}
}
