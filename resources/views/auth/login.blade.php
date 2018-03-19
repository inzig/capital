@extends('layouts.auth')

@section('form')
    <form action="" method="post" name="Login_Form" class="form-signin">
        {!! csrf_field() !!}

        <div class="pull-left login-top-txt">
            <img class="center-block" src="{!! asset('img/login/login-txt.png') !!}">
        </div>
        <a href="{{ url('/register') }}" class="pull-right register-btn-main">REGISTER</a>
        <br>

        <div class="form-group email-form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
            <input name="email" placeholder="E-Mail" class="form-control email-input-fld" type="email">

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

        <div class="form-group">
            <label class="pull-left color-golden">
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>

        <div class="bg-login">
            <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>
            <div class="col-md-12">
                <div class="checkbox">
                    <a href="{{ url('/password/reset') }}" class="forgot-link">Forgot Your Password &gt;</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </form>
@endsection
