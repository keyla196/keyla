<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $grupos->id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $grupos->nombre }}</p>
</div>

<!-- Fechainicio Field -->
<div class="form-group">
    {!! Form::label('fechainicio', 'Fechainicio:') !!}
    <p>{{ $grupos->fechainicio }}</p>
</div>

<!-- Fechafin Field -->
<div class="form-group">
    {!! Form::label('fechafin', 'Fechafin:') !!}
    <p>{{ $grupos->fechafin }}</p>
</div>

