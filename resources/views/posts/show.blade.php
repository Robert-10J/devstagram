@extends('layouts.app')

@section('titulo')
  {{ $post->titulo }}
@endsection

@section('contenido')
  <div class="container mx-auto md:flex px-2">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt="Imagen del post {{ $post->titulo }}">
      <div class="p-3 flex items-center gap-3">
        @auth
          @if ($post->checkLike(auth()->user()))
            <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
              @method('DELETE')
              @csrf
              <div class="my-4">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>          
                </button>
              </div>
            </form>
          @else
            <form action="{{ route('posts.likes.store', $post) }}" method="POST">
              @csrf
              <div class="my-4">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>          
                </button>
              </div>
            </form>
          @endif
        @endauth
        <p class="font-bold">
          {{ $post->likes->count() }} <span class="font-normal">Likes</span>
        </p>

        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>          
          <p class="font-bold">
            {{ $post->comentarios->count() }} <span class="font-normal">Comentarios</span>
          </p>
        </div>
        <div>
          <button type="button" id="share-post" class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
            </svg>                    
            <p class="font-bold">
              <span class="font-normal">Compartir</span>
            </p>
          </button>
        </div>
      </div>
      <div class="gap-4">
        <p class="mt-5 font-black">
          {{ $post->descripcion }}
        </p>
        <p class="font-bold text-gray-500">{{ $post->user->username}}</p>
        <p class="text-sm text-gray-500">
          {{ $post->created_at->diffForHumans() }}
        </p>
      </div>
      @auth
        @if ($post->user_id === auth()->user()->id)          
          <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @method('DELETE')
            @csrf
            <input 
              type="submit"
              value="Eliminar Publicación"
              class="bg-red-500 hover:bg-red-600 p-2 rounded text-white mt-2 font-bold cursor-pointer"
            />
          </form>
        @endif
      @endauth
    </div>
    
    <div class="md:w-1/2 p-5">
      <div class="shadow bg-gray-800 p-5 mb-5 rounded-lg">
        <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

        @if (session('mensaje'))
          <div class="border-l-green-800 border-l-4 bg-green-400 p-2 rounded-r-lg mb-6 text-white text-center uppercase font-bold">
            {{session('mensaje')}}
          </div>
        @endif

        @auth()
        <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
          @csrf
          <div class="mb-5">
            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
              Comentario: 
            </label>
            <textarea 
              name="comentario" 
              id="comentario"
              placeholder="Agrega un Comentario"
              class="bg-gray-700 p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
            ></textarea>
  
              @error('comentario')
                <p class="text-white text-center text-sm my-3 border-l-4 border-l-red-800 p-1 rounded-r-lg bg-red-500">
                  {{ $message }}
                </p>
              @enderror
          </div>
          
          <input 
            type="submit"
            value="Comentar"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
          />
        </form>
        @endauth

        <div class="bg-gray-700 shadow mb-5 max-h-96 overflow-y-scrol mt-10 rounded">
          @if ($post->comentarios->count())
            @foreach ($post->comentarios as $comentario)
              <div class="p-3 border-gray-500 border-b">
                <a href="{{ route('posts.index', $comentario->user) }}" class="text-sm font-semibold">
                  {{ $comentario->user->username }}
                </a>
                <p>{{ $comentario->comentario }}</p>
                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
              </div>
            @endforeach
          @else
            <p class="p-10 text-center">No hay Comentarios Aún</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@vite('resources/js/functions.js')