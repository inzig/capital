<table class="table table-responsive table-sortable" id="{!! $contentType !!}-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Weight</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sortableContents as $sortableContent)
        <tr>
            <td>{!! $sortableContent->title !!}</td>
            <td>{!! $sortableContent->weight !!}</td>
            <td>
                {!! Form::open(['route' => [$contentType.'.destroy', $sortableContent->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route($contentType.'.edit', [$sortableContent->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>