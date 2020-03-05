<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $musico->id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $musico->nombre }}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{{ $musico->apellido }}</p>
</div>

<!-- Instrumento Field -->
<div class="form-group">
    {!! Form::label('instrumento', 'Instrumento:') !!}
    <p>{{ $musico->instrumento }}</p>
</div>

<!-- Fechanacimiento Field -->
<div class="form-group">
    {!! Form::label('fechanacimiento', 'Fechanacimiento:') !!}
    <p>{{ $musico->fechanacimiento }}</p>
</div>

<!-- Fechamuerte Field -->
<div class="form-group">
    {!! Form::label('fechamuerte', 'Fechamuerte:') !!}
    <p>{{ $musico->fechamuerte }}</p>
</div>

