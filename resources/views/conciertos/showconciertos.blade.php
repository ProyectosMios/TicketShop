@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@endsection

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Listado de conciertos</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="form-row">
                <div class="col-sm-4 m">
                    <input type="text" class="form-control" name="busqueda">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </div>
            <div class="px-4 py-6 sm:px-0">
                <!-- <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div> -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 py-8">
                    @forelse ($conciertos as $concierto)
                        <article class="w-full h-80 bg-contain bg-center" style="background-image: url(@if($concierto->imagen) {{ Storage::url($concierto->imagen->direccion) }} @else {{ Storage::url('imagen/logo.png') }} @endif)">
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
                            <p><strong class="font-bold">{{ __("No hay conciertos") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todav??a no hay nada que mostrar aqu??") }}</span>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
    <div class="mt-3">
        {{ $conciertos->links() }}
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $("#busqueda").autocomplete({
            search: function(request, response){
                $.ajax({
                    url: "{{ route('busqueda.conciertos') }}",
                    dataType: "json",
                    data:{
                        termino: request.term
                    },
                    success:function(data){
                        response(data)
                    }
                });
            };
        });
    </script>
@endsection
