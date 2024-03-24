<?php

namespace SAJDEV\belara\controller;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public static function UpdateImage($file, $path, $lastimage)
    {
        $image_name = null;

        if (!empty($file)) {

            if ($lastimage != null) {

                if (file_exists($path . '/' . $lastimage)) {
                    unlink(public_path($path) . '/' . $lastimage);
                }

            }

            $image_name = time().rand(0,9999) . $file->getClientOriginalName();
            $file->move(public_path($path), $image_name);

        } else {
            $image_name = $lastimage;
        }

        return $image_name;
    }

    public static function deleteImage($path, $image)
    {

            if (!empty($image)) {
                if (file_exists($path . $image)) {

                    unlink(public_path($path  . $image));
                }

        }
    }
}
