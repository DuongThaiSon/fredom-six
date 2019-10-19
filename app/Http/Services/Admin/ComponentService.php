<?php

namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Component;
use Auth;


Class ComponentService
{
    private $attributes = [
        'name', 'detail',
    ];
    public function componentCreate($request)
    {
        $attributes = $request->only($this->attributes);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['is_public'] = $request->has('is_public')?1:0;
        $attributes['order'] = Component::max('order') ? (Component::max('order') + 1) : 1;
        $attributes['created_by'] = Auth::id();

        return $attributes;
        
    }
    public function componentEdit($request)
    {
        $attributes = $request->only($this->attributes);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['is_public'] = $request->has('is_public')?1:0;
        $attributes['order'] = Component::max('order') ? (Component::max('order') + 1) : 1;
        $attributes['updated_by'] = Auth::id();
        
        return $attributes;

    }
}