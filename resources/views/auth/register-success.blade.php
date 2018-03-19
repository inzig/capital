@extends('layouts.auth')

@section('title')
    Activate your account
@endsection

@section('form')
    <div class="padding-login-fields">
        <p>We sent you an email with instructions to activate your account.</p>
        <p>Please follow instructions in the email.</p>
    </div>

    <div class="col-md-12 padding-none">
        <a href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block btn-register"><i class="fa fa-sign-in fa-fw"></i> Login to your account</a>
    </div>
@endsection
