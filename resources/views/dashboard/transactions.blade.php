@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Transactions History</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>Date/Time</th>
                        <th>Coins Paid</th>
                        <th>Tokens Received</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>{!! $transaction->dated or '' !!}</td>
                            <td>{!! $transaction->amount or '' !!} {!! $transaction->currency or '' !!}</td>
                            <td>@if(!empty($transaction->actual_tokens)) {!! $transaction->actual_tokens !!} @else {!! $transaction->estimated_tokens !!} estimated @endif</td>
                            <td>@if(is_null($transaction->is_approved)) Pending @elseif($transaction->is_approved == 1) Approved @else Disapproved @endif</td>
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
