<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        return response()->json([
            'data' => 'hii'
        ]);
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
