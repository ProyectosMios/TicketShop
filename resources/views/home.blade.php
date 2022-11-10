@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Conciertos en los próximos 7 días</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <!-- <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div> -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 py-8">
                    @forelse ($conciertos as $concierto)
                        <article class="w-full h-80 bg-contain bg-center" style="background-image: url(@if($concierto->imagen) {{ Storage::url($concierto->imagen->direccion) }} @else ../../imagen/logo.png @endif)">
                            <div class="w-full h-full px-8 flex flex-col justify-center">
                                <h1 class="text-4xl text-white leading-8 font-bold">
                                    <a href="{{ route('concierto.show',$concierto)}}">
                                        {{ $concierto->nombre }}
                                    </a>
                                </h1>
                            </div>
                        </article>
                    @empty
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay conciertos en los próximos 7 días") }}</strong></p>
                            <span class="block sm:inline">{{ __("Lo sentimos, pronto tendremos más conciertos") }}</span>
                        </div>
                    @endforelse
            <!-- /End replace -->
                </div>
            </div>
        </div>
    </main>
@endsection
