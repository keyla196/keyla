<div class="table-responsive">
    <table class="table" id="musicos-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Apellido</th>
        <th>Instrumento</th>
        <th>Fechanacimiento</th>
        <th>Fechamuerte</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($musicos as $musico)
            <tr>
                <td>{{ $musico->nombre }}</td>
            <td>{{ $musico->apellido }}</td>
            <td>{{ $musico->instrumento }}</td>
            <td>{{ $musico->fechanacimiento }}</td>
            <td>{{ $musico->fechamuerte }}</td>
                <td>
                    {!! Form::open(['route' => ['musicos.destroy', $musico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('musicos.show', [$musico->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('musicos.edit', [$musico->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
