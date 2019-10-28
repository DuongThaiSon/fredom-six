<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class MediaController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'image'
        ]);

        $uploadPath = 'media/ckeditor/'; // upload path

        $destinationPath = public_path($uploadPath); // storage place
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        $extension = $request->file('upload')->getClientOriginalExtension(); // getting image extension

        // $tempName = $request->file("upload")->getClientOriginalName();
        $fileName = uniqid(date('d.m.Y')) . '.' .$extension; // renameing image
        // $request->file('upload')->move($destinationPath, $fileName); // upload origin file to given path
        $image = Image::make($request->file('upload')); //
        $image->save($destinationPath.$fileName); // upload file with reduce quality
        // $image->resize(300,188)->save($destinationPath.'thumbnail/'.$fileName); // upload file with fixed size
        // $image->resize(300, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'thumbnail/'.$fileName); // upload file with aspect ratio

        // $image->resize(300, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->crop(300,188)->save($destinationPath.'thumbnail/'.$fileName); // upload file combine resize and crop


        $url = asset($uploadPath.$fileName);

        return response()->json(compact('url'), 200);
    }
}
