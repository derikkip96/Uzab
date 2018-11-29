@extends('manage.layouts.app')

@section('body-class')
    card-no-border
@endsection

@section('page-css')
    <link href="{{ asset('pro/css/pages/login-register-lock.css') }}" rel="stylesheet">
@endsection

@section('other-pages')
    <!-- Main wrapper - style you can find in pages.scss -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{ asset('pro/images/background/login-register.jpg') }});">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="{{ route('merchant.perform.login') }}" method="POST">

                        @csrf

                        <a href="#" class="text-center db">
                            {{--<img src="{{ asset('logo.png') }}" alt="{{ config('app.name') }} Logo" title="{{ config('app.name') }} Logo" />--}}
                            <h3>Ecommerce</h3>
                        </a>

                        <h2 class="box-title m-t-40 m-b-0 text-center">{{ __('LOGIN') }}</h2><br>
                        <h5 class="text-center">
                            {{ __('Login to your account') }}
                        </h5>
                        <br>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="email"><b>{{ __('Email') }}</b></label>
                                <input class="form-control" placeholder="Enter your Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for=""><b>{{ __('Password') }}</b></label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info float-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox" name="remember" class="filled-in chk-col-light-blue" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="checkbox-signup">{{ __(' Remember me') }} </label>
                                </div>
                                <a href="{{ route('merchant.password.request') }}" id="to-recover" class="text-muted float-right"><i class="fa fa-lock m-r-5"></i> {{ __(' Forgot password?') }}</a>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ __('Log In') }}</button>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                {{ __('Don\'t have an account') }}? <a href="#" class="text-info m-l-5"><b>{{ __('Sign Up') }}</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection