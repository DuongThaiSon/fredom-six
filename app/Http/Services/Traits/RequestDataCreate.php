<?php

namespace App\Http\Services\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

trait RequestDataCreate
{
    public function Create($request, $order, $destinationDir, $name)
    {
        $attributes                 = $request->only($this->attributes);
        $attributes['created_by']   = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
        $attributes['order']        = $order ? ($order + 1) : 1;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;
        $avatar                     = $this->UploadImage($destinationDir,$name);
        if($request->hasFile('avatar')){
            $attributes['avatar']        = $avatar;
        }
        if($request->hasFile('image')) {
            $attributes['image']        = $avatar;
        }

        return $attributes;
    }
}
