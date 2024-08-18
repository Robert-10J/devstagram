@extends('layouts.layout')

@section('title')
  {{ $post->title }}
@endsection

@section('content')
  <div class="container mx-auto md:flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen de la publicacion {{ $post->title  }}">

      <div class="p-3">
        <p> 0 likes</p>
      </div>

      <div>
        <p class="font-bold"> {{ $post->user->username }}</p>
        <p class="text-sm text-gray-500">
          {{ $post->created_at->diffForHumans() }}
        </p>
        <p class="mt-5">
          {{ $post->description }}
        </p>
      </div>
    </div>

    <div class="md:w-1/2 p-5">
      <div class="shadow-lg bg-white mb-5 p-5 rounded-lg">

        @auth  
          <p class="text-xl font-semibold text-center mb-4">Agrega un comentario</p>

          @if (session('message'))
            <p class="bg-green-500 uppercase text-white text-xl p-2 rounded-lg mb-6">
              {{ session('message') }}
            </p>
          @endif

          <form action="{{ route('comments.store', ['user' => $user, 'posts' => $post]) }}">
            @csrf
            <div class="mb-5">
              <label 
                for="comment"
                class="mb-2 block uppercase text-gray-500 font-bold"
              >Haz un comentario:</label>
              <textarea 
                id="comment"
                name="comment""
                placeholder="Escribe tu comentario"
                class="border p-3 w-full rounded-lg @error('') border-red-500 @enderror"
              ></textarea>
              @error('comment')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
              @enderror
            </div>

            <input
              type="submit" value="Comentar"
              class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />
          </form>
        @endauth
      </div>
    </div>
  </div>
@endsection