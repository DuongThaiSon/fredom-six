<?php

namespace App\Http\Services\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

trait RequestDataEdit
{
    public function Edit($request, $destinationDir, $name)
    {
        $attributes                 = $request->only($this->attributes);
        $attributes['updated_by']   = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
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
