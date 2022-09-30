@extends('adminlte::page')

@section('title', 'Crear Conciertos')

@section('content_header')
    <h1>Alta de nuevo concierto</h1>
@endsection

@section("content")
    @include("admin.conciertos.formulario")
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
    </script>
    
    <script> console.log('Hi!'); </script>
@stop