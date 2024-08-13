<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(8);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string', 'max:500'],
            'image' => 'required'
        ]);

        /* Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => Auth::user()->id
        ]); */

        // OTRA FORMA DE ALMACENAR REGISTROS CUANDO YA SE TIENE RELACIONES ENTRE MODELOS
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('post.index', Auth::user()->username);
    }
}   
