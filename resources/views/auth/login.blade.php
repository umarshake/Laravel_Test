@extends('layouts.app')

@section('content')

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO APP</h3>
                <small></small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="{{ url('login')}}" method="post" id="loginForm">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="username">{{ __('E-MailAddress') }}</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="username" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} ">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong><label class="error">{{ $errors->first('email') }}</label></strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">{{ __('Password') }}</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong><label class="error">{{ $errors->first('password') }}</label></strong>
                                    </span>
                                @endif
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" class="i-checks" checked>
                                    {{ __('Remember Me') }}
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button class="btn btn-success btn-block">{{ __('Login') }}</button>
                            <a class="btn btn-default btn-block" href="register">Register</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <!-- <strong>HOMER</strong> - AngularJS Responsive WebApp <br/> 2015 Copyright Company Name -->
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
