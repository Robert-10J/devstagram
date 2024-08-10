<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $isCorrectUser = Auth::attempt($request->only('email', 'password'));

        if (!$isCorrectUser) {
            return back()->with('message', 'Correo o contraseña incorrectos');
        }

        return redirect()->route('post.index');
    }
}
