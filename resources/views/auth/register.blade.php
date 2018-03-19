@extends('layouts.auth')

@section('form')
    <form action="{{ url('/register') }}" method="post" name="Login_Form" class="form-signin">
        {!! csrf_field() !!}
        <div href="#" class="pull-left login-top-txt">
            <img class="center-block" src="{!! asset('img/login/register-txt-icon.png') !!}">
        </div>
        <a href="{{ url('/login') }}" class="pull-right register-btn-main">LOGIN</a>
        <br>

        <div class="form-group email-form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
            <input name="name" placeholder="Name" class="form-control user-input-fld" type="text">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <input name="email" placeholder="Email" class="form-control reg-email-input-fld" type="text">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input name="password" placeholder="Password" class="form-control pass-input-fld" type="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input name="password_confirmation" placeholder="Confirm Password" class="form-control pass-input-fld" type="password">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="col-md-12 google-captcha no-padding">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
        </div>

        <div class="col-md-12 no-padding">
            <div class="checkbox">
                <label class="">
                    <input name="agree_terms" type="checkbox"> I have read and agree token sale terms
                </label>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="bg-login register-btn-col ">
            <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Register" type="Submit">REGISTER</button>
        </div>
    </form>
@endsection
