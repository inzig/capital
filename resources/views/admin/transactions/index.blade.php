@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Transactions</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-4">
                    <a class="btn btn-primary" href="{!! url('admin/transactions/ethereum/sync') !!}">Sync Ethereum Transactions</a>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                @include('admin.transactions.table')
            </div>
        </div>
    </div>
@endsection

