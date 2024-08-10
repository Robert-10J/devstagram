@extends('layouts/layout')

@section('title')
  Iniciar Sesión
@endsection

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">

    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow">
      <form action="{{ route('login') }}" method="POST" novalidate>
        @csrf
        @if(session('message'))
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ session('message') }}
          </p>
        @endif

        <div class="mb-5">
          <label 
            for="email"
            class="mb-2 block uppercase text-gray-500 font-bold"
          >E-mail:</label>
          <input 
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="E-mail"
            class="border p-3 w-full rounded-lg @error('') border-red-500 @enderror"
          />
          @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label 
            for="password"
            class="mb-2 block uppercase text-gray-500 font-bold"
          >Contraseña:</label>
          <input 
            type="password"
            id="password"
            name="password"
            placeholder="Contraseña"
            class="border p-3 w-full rounded-lg @error('') border-red-500 @enderror"
          />
          @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input type="checkbox" name="remember" id="remember">
          <label 
            class="text-gray-500 text-sm"
            for="remember"
          >Mantener sesión activa</label>
        </div>

        <input
          type="submit" value="Iniciar sesión"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
@endsection