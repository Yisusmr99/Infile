<div class="form-group">
    {!! Form::label('nombre', 'Nombre el usuario') !!}
    {!! Form::text('nombre',  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('correo', 'Correo') !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefono', 'telefono') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>  