<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $img->extension();

        $imgServidor = Image::make($img);
        $imgServidor->fit(1000, 1000);

        $imgPath = public_path('uploads') . '/' . $nombreImagen;
        $imgServidor->save($imgPath);
        
        return response()->json(['imagen' => $nombreImagen]);
    }
}
