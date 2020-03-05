<div class="table-responsive">
    <table class="table" id="musicogrupos-table">
        <thead>
            <tr>
                <th>Idgrupo</th>
        <th>Idmusico</th>
        <th>Instrumento</th>
        <th>Fechanacimiento</th>
        <th>Fechamuerte</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($musicogrupos as $musicogrupos)
            <tr>
                <td>{{ $musicogrupos->idgrupo }}</td>
            <td>{{ $musicogrupos->idmusico }}</td>
            <td>{{ $musicogrupos->instrumento }}</td>
            <td>{{ $musicogrupos->fechanacimiento }}</td>
            <td>{{ $musicogrupos->fechamuerte }}</td>
                <td>
                    {!! Form::open(['route' => ['musicogrupos.destroy', $musicogrupos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('musicogrupos.show', [$musicogrupos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('musicogrupos.edit', [$musicogrupos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
