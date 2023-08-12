<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:15', 'not_in:twitter,editar-perfil'],
            // 'password' => 'min:6'
        ]);

        if ($request->imagen) {
            $img = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $img->extension();

            $imgServidor = Image::make($img);
            $imgServidor->fit(1000, 1000);

            $imgPath = public_path('perfiles') . '/' . $nombreImagen; 
            $imgServidor->save($imgPath);
        }

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        // $usuario->password = $request->password ?? auth()->user()->password;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
