<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre del artista']) !!}
    @error("nombre")
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrap">
            @isset ($artista->foto)
                <img id="fotografia" src="{{ Storage::url($artista->foto->direccion) }}" alt="">
            @else
                <img id="fotografia" src="{{ Storage::url('imagen/logo.png') }}" alt="">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('foto', 'Foto que vamos a poner:') !!}
            {!! Form::file('foto', ['class' => 'form-control-file']) !!}
            @error('foto')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('informacion', 'Informacion del artista:') !!}
    {!! Form::textarea('informacion', null, ['rows' => 3,'class' => 'form-control','placeholder' => 'Informacion del artista']) !!}
    @error("informacion")
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>