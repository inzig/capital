<table class="table table-responsive" id="{!! $contentType !!}-table">
    <thead>
        <tr>
            <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->slug !!}</td>
            <td>
                {!! Form::open(['route' => [$contentType.'.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route($contentType.'.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>