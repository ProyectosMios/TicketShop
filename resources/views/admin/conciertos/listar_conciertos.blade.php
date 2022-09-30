@extends('adminlte::page')

@section('title', 'Listado de conciertos')

@section('content_header')
    <h1 class="text-center text-success">{{ __("Listado de conciertos") }}</h1>
@stop

@section('content')
    <div class="container">
        <a href="{{ route('admin.conciertos.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Añadir concierto") }}
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 py-8">
            @forelse ($conciertos as $concierto)
                <article class="w-full h-80 bg-contain bg-center" style="background-image: url(../conciertos/{{ $concierto->imagen }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
                                {{ $concierto->nombre }}
                            </a>
                        </h1>
                    </div>
                </article>
            @empty
                <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <p><strong class="font-bold">{{ __("No hay conciertos") }}</strong></p>
                    <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                </div>
            @endforelse
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop