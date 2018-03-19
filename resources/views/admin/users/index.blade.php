@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <section class="content-header">
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right" href="{!! route('users.create') !!}">Add New</a>
                    </h1>
                </section>
                @include('admin.users.table')
            </div>
        </div>
    </div>
@endsection

