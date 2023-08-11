{{-- 
  * Tene opción de cambiar contraseña
  * Solicitar contraseña al momento de realizar los cambios
--}}

@extends('layouts.app')

@section('titulo')
  Editar Perfil: {{ auth()->user()->username}}
@endsection

@section('contenido')

  <div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
      <form action="{{ route('perfil.store') }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
        @csrf
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username: 
          </label>
          <input 
            type="text"
            id="username"
            name="username"
            value="{{ auth()->user()->username }}"
            placeholder="Username"
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" />

            @error('username')
              <p class="text-white text-center text-sm my-3 border-l-4 border-l-red-800 p-1 rounded-r-lg bg-red-500">
                {{ $message }}
              </p>
            @enderror
        </div>
        <div class="mb-5">
          <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
            Imagen Perfil:
          </label>
          <input 
            type="file"
            id="imagen"
            name="imagen"
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
            {{-- accept=".jpg .jpeg .png" --}}
          />
        </div>

        <input 
          type="submit"
          value="Guardar Cambios"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
  
@endsection