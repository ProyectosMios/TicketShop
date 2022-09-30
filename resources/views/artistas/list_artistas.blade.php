@extends('layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Listado de artistas</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <!-- <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div> -->
                <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="px-4 py-2">{{ ("Nombre") }}</th>
                        <th scope="px-4 py-2">{{ ("Informacion") }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($artistas as $artista)
                            <tr>

                                <td class="border px-4 py-2">{{ $artista->nombre }}</td>

                                <td class="border px-4 py-2">{{ $artista->informacion }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <p><strong class="font-bold">{{ __("No hay artistas") }}</strong></p>
                                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /End replace -->
        </div>
    </main>
    <div class="mt-3">

    </div>
@stop