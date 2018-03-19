@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        <div class="clearfix"></div>
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post" action="{!! route('change-password') !!}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="password">Current Password:</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" name="new_password" class="form-control" id="new_password">
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">Confirm Password:</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Profile</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Full name:</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name or '' }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
