@extends('layouts/layout')

@section('title')
  Crear Publicación
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
      <form 
        id="dropzone"
        enctype="multipart/form-data"
        action="{{ route('images.store') }}" 
        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"
      >
        @csrf
      </form>
    </div>
    
    <div class="md:w-1/2 px-10 bg-white rounded-lg shadow-xl p-10 mt-10 md:mt-0">
      <form action="{{ route('post.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
          <label 
            for="title"
            class="mb-2 block uppercase text-gray-500 font-bold"
          >Título:</label>
          <input 
            type="title"
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Título"
            class="border p-3 w-full rounded-lg @error('') border-red-500 @enderror"
          />
          @error('title')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label 
            for="description"
            class="mb-2 block uppercase text-gray-500 font-bold"
          >Descripción:</label>
          <textarea 
            id="description"
            name="description""
            placeholder="Descripción de la publicación"
            class="border p-3 w-full rounded-lg @error('') border-red-500 @enderror"
          >{{ old('description') }}</textarea>
          @error('description')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input type="hidden" name="image" value="{{ old('image') }}"/>
          @error('image')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <input
          type="submit" value="Publicar"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        />
      </form>
    </div>
  </div>
@endsection