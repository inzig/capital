@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Transactions History</h3>
            </div>
            <div class="box-body" >            
                <table style="overflow-x:auto;" class="table table-hover table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Date/Time</th>
                        <th>currency1</th>
                        <th>currency2</th>
                        <th>amount</th>
                        <th>address</th>
                        <th>buyer_email</th>
                        <th>buyer_name</th>
                        <th>item_name</th>
                        <th>status_text</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>{!! $transaction->created_at or '' !!}</td>
                            <td>{!! $transaction->currency1 or '' !!}</td>                            
                            <td>{!! $transaction->currency2 or '' !!}</td>                            
                            <td>{!! $transaction->amount or '' !!}</td>                            
                            <td>{!! $transaction->address or '' !!}</td>                            
                            <td>{!! $transaction->buyer_email or '' !!}</td>                            
                            <td>{!! $transaction->buyer_name or '' !!}</td>                            
                            <td>{!! $transaction->item_name or '' !!}</td>                            
                            <td>{!! $transaction->status_text or '' !!}</td>                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">You do not have any transaction yet.</td>
                        </tr5
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
