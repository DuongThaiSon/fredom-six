<?php

namespace App\Http\Services\Traits;

use Illuminate\Http\Request;

trait HandleUpload
{
    public function UploadImage($destinationDir, $name)
    {
        if($name) {
            $file                 = uniqid('leotive').'.'.$name->extension();
            $name->move(public_path($destinationDir), $file);
            $attributes['avatar'] = $destinationDir.$file;
        }
        return $attributes;
    }
}
