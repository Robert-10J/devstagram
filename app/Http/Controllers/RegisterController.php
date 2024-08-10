<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    { 
        return view('auth.register'); 
    }

    public function store(Request $request)
    {
        /* Se modifica el request para evitar nombres de usuario duplicados */
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'name'     => ['required', 'string', 'max:25', 'min:4'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required','min:6', 'confirmed'],
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only('email', 'password'));
        
        return redirect()->route('post.index');
    }
}
