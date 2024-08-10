@extends('layouts.layout')

@section('title')
  Perfil {{ $user->username }}
@endsection

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
@endsection