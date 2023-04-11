<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
//    public function destroy(Image $image)
//    {
//        FileService::delete($image->img);
//        return back();
//    }
    public function destroy()
    {
        $image = Image::find(request('data'));
        FileService::delete($image->img);
        $image->delete();
        return response()->json('ok');
    }
}
