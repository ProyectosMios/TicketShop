@extends('layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Listado de conciertos</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <!-- <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div> -->
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
            <!-- /End replace -->
        </div>
    </main>
    <div class="mt-3">

    </div>
@stop