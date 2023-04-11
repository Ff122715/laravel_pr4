<?php

namespace App\Http;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function upload($file, $dir = '/', $default = '/default/default_img.jpg')
    {
        if ($file != null) {
            $path = $file->store($dir, 'public');
        } else {
            $path = $default;
        }
        return url('/storage/' . $path);
//        return pathinfo($path, PATHINFO_BASENAME);
    }

    public static function delete($url)
    {
        $path = '/public/products/' . pathinfo($url, PATHINFO_BASENAME);
        if (Storage::exists($path)) {
            return Storage::delete($path);
        }
        return false;
    }

    public static function update($url, $old_file, $new_file)
    {
//      if ($old_file != $new_file) {
//          self::delete($old_file);
//          self::upload($new_file );
//      }
        $file = pathinfo($url, PATHINFO_BASENAME);
        if ($new_file != '') {
            $file != 'default_img.jpg' ? self::delete($old_file) : '';
            return self::upload($new_file, '/products');
        }
        return $url;
    }

    public static function updateManyImages($productImage, $images)
    {
//        dd($productImage);
        if (isset($productImage) && isset($images)) {
            foreach ($images as $image) {
                $file = pathinfo($image, PATHINFO_BASENAME);
//                dd($file);
//            if ($new_file != '') {
//                $file != 'default_img.jpg' ? self::delete($old_file) : '';
                return self::upload($file, '/products');
//            }
//            return $url;
            }
        }
        else {
            self::upload($file, '/default');
        }
    }
}
