@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="text-center text-4xl font-bold text-gray-600 mb-5">{{ $concierto->nombre }}</h1>
        <div class="grid grid-cols-3">
            <div class="col-span-2 text-lg text-gray-500 mb-2">
                {!! $concierto->informacion !!}
            </div>
            <figure>
                <img class="mx-auto d-block mb-5" src="{{ Storage::url($concierto->imagen->direccion) }}" alt="Cartel">
            </figure>
        </div>
        <div class="grid grid-cols-3">
            <div class="text-center col-span-2 text-4xl font-bold text-orange-600">
                Precio entrada: {{ $concierto->precio }}
            </div>
            <div class="text-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Comprar entradas</button>
            </div>
        </div>
    </div>
@stop