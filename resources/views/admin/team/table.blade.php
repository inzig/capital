<table class="table table-responsive table-sortable" id="{!! $contentType !!}-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Weight</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($teams as $team)
        <tr>
            <td><img src="{!! asset($team->image) !!}" class='img-responsive img-thumbnail'/></td>
            <td>{!! $team->weight !!}</td>
            <td>
                {!! Form::open(['route' => [$contentType.'.destroy', $team->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route($contentType.'.edit', [$team->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>