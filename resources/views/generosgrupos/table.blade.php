<div class="table-responsive">
    <table class="table" id="generosgrupos-table">
        <thead>
            <tr>
                <th>Idgrupos</th>
        <th>Idgenero</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($generosgrupos as $generosgrupos)
            <tr>
                <td>{{ $generosgrupos->idgrupos }}</td>
            <td>{{ $generosgrupos->idgenero }}</td>
                <td>
                    {!! Form::open(['route' => ['generosgrupos.destroy', $generosgrupos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('generosgrupos.show', [$generosgrupos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('generosgrupos.edit', [$generosgrupos->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
