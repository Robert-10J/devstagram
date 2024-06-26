@extends('layouts.app')

@section('titulo')
  Registrate en DevStagram
@endsection

@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
    </div>

    <div class="md:w-4/12 bg-white p-6 r rounded-lg shadow-xl">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Nombre: 
          </label>
          <input 
            type="text"
            id="name"
            name="name"
            placeholder="Tu Nombre"
            value="{{ old('name') }}"
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
        </div>
        @error('name')
          <p class="text-red-500 text-center text-sm my-2">{{ $message }}</p>
        @enderror
        
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username: 
          </label>
          <input 
            type="text"
            id="username"
            name="username"
            value="{{ old('username') }}"
            placeholder="Tu Nombre de Usuario"
            class="border p-3 w-full rounded-lg">
        </div>
        @error('username')
          <p class="text-red-500 text-center text-sm my-2">{{ $message }}</p>
        @enderror

        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            Email: 
          </label>
          <input 
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Tu Email de Registro"
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
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Repetir Password: 
          </label>
          <input 
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Repetir Password"
            class="border p-3 w-full rounded-lg">
        </div>

        <input 
          type="submit"
          value="Crear Cuenta"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
@endsection