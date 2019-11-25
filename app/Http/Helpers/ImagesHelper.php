<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImagesHelper
{

    public function upload($name , $image , $path )
    {
       //$name = New \DateTime();

       // $file = $name->getTimestamp().'.'. $image->getClientOriginalExtension();

        $file = $name ;

        $image->move(public_path($path), $file);

        $img = Image::make(public_path($path).$file);

        $img->resize(640, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        //$img->resize(640,480);
        $img->save();
    }

    public function deleteFile($file = null)
    {
       File::delete(public_path($file));
    }



}




