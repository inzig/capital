<table class="table table-responsive table-sortable" id="discounts-table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
        <th>Rates</th>
    </tr>
    </thead>
    <tbody>
    @foreach($discounts as $discount)
        <tr>
            <td>{!! $discount->title !!}</td>
            <td>{!! $discount->start_date !!}</td>
            <td>{!! $discount->end_date !!}</td>
            <td>
                {!! Form::open(['route' => ['discounts.destroy', $discount->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('discounts.edit', [$discount->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td><a href="{!! url('admin/discounts/'.$discount->id.'/rates') !!}">View rates</a></td>
        </tr>
    @endforeach
    </tbody>
</table>