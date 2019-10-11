<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailContent extends Model
{
    protected $fillable = [
        'id', 'name', 'send_when', 'need_value', 'detail'
    ];
    public function settinUpdateBy()
    {
        return $this->belongsTo('App\Models\User', 'update_by');
    }
}
