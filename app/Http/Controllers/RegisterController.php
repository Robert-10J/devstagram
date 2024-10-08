<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

    public function store(RegisterRequest $request)
    {
        /* Se modifica el request para evitar nombres de usuario duplicados */
        $request->request->add(['username' => Str::slug($request->username)]);
        $request->validated();

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only('email', 'password'));
        
        return redirect()->route('post.index', [
            'user' => $user
        ]);
    }
}
