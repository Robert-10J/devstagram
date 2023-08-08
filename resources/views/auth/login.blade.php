@extends('layouts.app')

@section('titulo')
  Inicia Sesión en DevStagram
@endsection

@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 r rounded-lg shadow-xl">
      <form method="POST" action="{{ route('login') }}">
        @if (session('mensaje'))
          <p class="text-red-500 text-center text-sm my-2">
            {{ session('mensaje') }}
          </p>
        @endif

        @csrf
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            Email: 
          </label>
          <input 
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Tu Email"
            class="border p-3 w-full rounded-lg">
        </div>
        @error('email')
          <p class="text-red-500 text-center text-sm my-2">{{ $message }}</p>
        @enderror

        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
            Password: 
          </label>
          <input 
          type="password"
            id="password"
            name="password"
            placeholder="Password de Registro"
            class="border p-3 w-full rounded-lg">
        </div>
        @error('password')
        <p class="text-red-500 text-center text-sm my-2">{{ $message }}</p>
        @enderror
        
        <div class="mb-5">
          <input 
          type="checkbox" 
          name="remember" 
          id=""
          />
          <label for="password" class=" text-gray-500 text-sm">
            Mantener mi Sesión Abierta
          </label>
        </div>

        <input 
          type="submit"
          value="Inicia Sesión"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
@endsection