<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{   
    // por convencion si el metodo mostrara una vista debe llamarse index
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->get('username')); manera de acceder a los datos directamente
        $this->validate($request, [
            'name' => 'required|max:25',
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email|max:45',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Autenticar usuario
        /* auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */
        
        // Otra manera de autenticar
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar
        return redirect()->route('posts.index');
    }
}
