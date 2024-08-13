<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Imagick\Driver;

/* 
    Problema con imagick
    $serverImage = ImageManager::gd()->read($image);
    $imagenServidor = ImageManager::gd()->read($imagen);
*/

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        $nameImage = Str::uuid() . "." . $image->extension();
        
        /* $serverImage = Image::make($nameImage);
        $serverImage->create(1000, 1000); */
        
        $manager = new ImageManager(new Driver());
        $serverImage = $manager->read($image);
        $serverImage->scale(1000, 1000);
        
        $pathImage = public_path('uploads') . "/" . $nameImage;
        $serverImage->save($pathImage);

        return response()->json(['image' => $nameImage]);
    }
}
