<table class="table table-responsive" id="posts-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Weight</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{!! $post->title !!}</td>
            <td>{!! $post->slug !!}</td>
            <td>{!! $post->status !!}</td>
            <td>{!! $post->weight !!}</td>
            <td>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>