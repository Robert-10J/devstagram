@extends('layouts.layout')

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row">
      <div class="md:w-8/12 lg:w-6/12 px-5">
        <img src="{{ asset('img/usuario.svg') }}" alt="imagen de perfil del usuario">
      </div>
      
      <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
        <p class="font-bold text-gray-700 text-2xl">{{ $user->username }}</p>

        <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
          0 <span> Seguidores</span>
        </p>
        <p class="text-gray-800 text-sm mb-3 font-bold">
          0 <span> Seguidos</span>
        </p>
        <p class="text-gray-800 text-sm mb-3 font-bold">
          0 <span> Publicaciones</span>
        </p>
      </div>
    </div>
  </div>

  <section class="mt-10 container mx-auto">
    <h3 class="text-4xl text-center font-black my-10'">Publicaciones</h3>

    @if ($posts->count() > 0)  
      <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-5">
        @foreach ($posts as $post)
          <div>
            <a href="{{ route('posts.show', ['posts' => $post, 'user' => $user]) }}">
              <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">
            </a>
          </div>
        @endforeach
      </div>
      
      <div class="my-10">
        {{ $posts->links() }}
      </div>
    @else
      <p class="text-2xl font-bold text-center text-gray-600 uppercase">Aún no tienes publicaciones</p>
    @endif
  </section>
@endsection