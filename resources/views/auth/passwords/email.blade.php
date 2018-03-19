@extends('layouts.auth')

@section('title')
    Reset your password
@endsection

@section('form')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <div class="padding-login-fields">
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <label class="display-block" for="email">Email</label>

                    <div class="input-group margin-bottom-10">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="email" class="form-control input-lg login-inputs" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-login">
            <button type="submit" class="btn btn-primary btn-lg btn-block btn-sign-in margin-bottom-10"><i class="fa fa-sign-in fa-fw"></i> SEND PASSWORD RESET LINK</button>
        </div>

        <div class="col-md-12 padding-none">
            <a href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block btn-register"><i class="fa fa-user-plus fa-fw"></i> Login to your account</a>
        </div>
    </form>
@endsection
