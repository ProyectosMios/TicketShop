<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => $route,'autocomplete' => 'off']) !!}
            {!! Form::hidden('imagen', 'imagen.png') !!}
            <div class="form-group">
                {!! Form::label('provincia_id', 'Provincia: ') !!}
                {!! Form::select('provincia_id', $provincias, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('artista_id', 'Artista: ') !!}
                {!! Form::select('artista_id', $artistas, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre del concierto']) !!}
                @error("nombre")
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('fechacelebracion', 'Fecha del concierto: ') !!}
                {!! Form::date('fechacelebracion', null) !!}
                @error("fechacelebracion")
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('informacion', 'Informacion del concierto:') !!}
                {!! Form::textarea('informacion', null, ['rows' => 3,'class' => 'form-control','placeholder' => 'Informacion del concierto']) !!}
                @error("informacion")
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('precio', 'Precio del concierto: ') !!}
                {!! Form::number('precio', 0, ['step' => 'any']) !!}
                @error("precio")
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {!! Form::submit($textButton, ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>