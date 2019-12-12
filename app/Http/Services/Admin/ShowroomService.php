<?php

namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Showroom;
use Auth;


Class ShowroomService
{
    private $attributes = [
        'name', 'detail', 'email', 'phone', 'address', 'avatar', 'regions', 'map', 'district', 'city'
    ];
    public function showroomCreate($request)
    {
        $attributes = $request->only($this->attributes);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['is_public'] = $request->has('is_public')?1:0;
        $attributes['order'] = Showroom::max('order') ? (Showroom::max('order') + 1) : 1;
        $attributes['created_by'] = Auth::id();

        return $attributes;
        
    }
    public function showroomEdit($request)
    {
        $attributes = $request->only($this->attributes);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['is_public'] = $request->has('is_public')?1:0;
        $attributes['updated_by'] = Auth::id();
        
        return $attributes;

    }
}