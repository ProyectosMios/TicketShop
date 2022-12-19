@extends('adminlte::page')

@section('title', 'Crear Conciertos')

@section('content_header')
    <h1>Alta de nuevo concierto</h1>
@endsection

@section("content")
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => $route,'autocomplete' => 'off','files' => true,'enctype'=>'multipart/form-data']) !!}
            {!! Form::hidden('imagen', 'imagen.png') !!}
            
            @include('admin.conciertos.fragmentos.formulario')

            {!! Form::submit($textButton, ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrap{
            position: relative;
            padding-bottom: 70%;
        }

        .image-wrap img{
            position: absolute;
            object-fit: cover;
            width: 50%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#informacion' ) )
            .catch( error => {
                console.error( error );
            } );

        //Cambiar el cartel cuando lo selecciono.
        document.getElementById("imagen").addEventListener('change', cambiarCartel);

        function cambiarCartel(event){
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = (event) => {
                document.getElementById('cartel').setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
    
    <script> console.log('Hi!'); </script>
@stop