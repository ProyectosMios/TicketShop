@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        @foreach($artistas as $artista)
            <a href="#"><h1 class="text-center text-4xl font-bold text-gray-600 mb-5">{{ $artista->nombre }}</h1></a>
            <div class="grid grid-cols-3">
                <figure>
                    <img class="mx-auto d-block mb-5" src="{{ Storage::url($artista->foto->direccion) }}" alt="Artista">
                </figure>
                <div class="col-span-2 text-lg text-gray-500 mb-2 ml-3">
                    {!! $artista->informacion !!}
                </div>
            </div>
        @endforeach
    </div>
@stop