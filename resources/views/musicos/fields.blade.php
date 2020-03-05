<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Instrumento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instrumento', 'Instrumento:') !!}
    {!! Form::text('instrumento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechanacimiento', 'Fechanacimiento:') !!}
    {!! Form::text('fechanacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechamuerte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechamuerte', 'Fechamuerte:') !!}
    {!! Form::text('fechamuerte', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('musicos.index') }}" class="btn btn-default">Cancel</a>
</div>
