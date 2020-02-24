<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    const TYPE = [
        'text', 'color'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'can_select' => 'boolean',
        'allow_multiple' => 'boolean',
    ];

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    public function productAttributeOptions()
    {
        return $this->hasMany(ProductAttributeOption::class);
    }
}
