<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.conciertos.store']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre del concierto']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>