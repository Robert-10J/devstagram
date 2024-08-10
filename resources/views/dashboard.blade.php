@extends('layouts.layout')

@section('title')
  Tu Perfil
@endsection

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
      <div class="md:w-8/12 lg:w-6/12 px-5">
        <img src="{{ asset('img/usuario.svg') }}" alt="imagen de perfil del usuario">
      </div>
      
      <div class="md:w-8/12 lg:w-6/12 px-5">
        <p class="font-bold text-gray-700 text-2xl">{{ auth()->user()->username }}</p>
        <p>{{ dd(auth()->user()) }}</p>
      </div>
    </div>
  </div>
@endsection