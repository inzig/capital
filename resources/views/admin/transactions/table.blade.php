<table class="table table-responsive" id="transactions-table">
    <thead>
        <tr>
            <th>Date</th>
            <th>User</th>
            <th>Coins Paid</th>
            <th>Estimated Tokens</th>
            <th>Actual Tokens</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Status</th>
            <th>Explorer</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{!! $transaction->dated !!}</td>
            <td>{!! $transaction->user->email !!}</td>
            <td>{!! $transaction->amount or '' !!} {!! $transaction->currency or '' !!}</td>
            <td>{!! $transaction->estimated_tokens !!}</td>
            <td>{!! $transaction->actual_tokens !!}</td>
            <td>{!! $transaction->source_address !!}</td>
            <td>{!! $transaction->destination_address !!}</td>
            <td>@if(is_null($transaction->is_approved)) Pending @elseif($transaction->is_approved == 1) Approved @else Disapproved @endif</td>
            <td>{!! $transaction->transaction_id or '' !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>