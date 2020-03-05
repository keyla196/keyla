<div class="table-responsive">
    <table class="table" id="generals-table">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($generals as $general)
            <tr>
                <td>{{ $general->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['generals.destroy', $general->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('generals.show', [$general->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('generals.edit', [$general->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
