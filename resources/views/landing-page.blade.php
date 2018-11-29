@extends('manage.layouts.app')

@section('body-class')
    card-no-border
@endsection

@section('page-css')
    <link href="{{ asset('pro/css/pages/register.css') }}" rel="stylesheet">
@endsection

@section('other-pages')
    <!-- Main wrapper - style you can find in pages.scss -->

        <div class="login-register" style="background-image:url({{ asset('pro/images/background/login-register.jpg') }});">
            <div class="register-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="registerform" action="{{ route('merchant.perform.register') }}" method="POST">

                        @csrf

                        <a href="#" class="text-center db">
                            <h3>Ecommerce</h3>
                        </a>

                        <h2 class="box-title m-t-40 m-b-0 text-center">{{ __('Sign up') }}</h2><br>
                        <h5 class="text-center">
                            {{ __('create your account') }}
                        </h5>
                        <br>
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <label for="email"><b>{{ __('Name') }}</b></label>
                                <input class="form-control" placeholder="Enter your Name" type="text" name="name" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

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

                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for=""><b>{{ __('Confirm Password') }}</b></label>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ __('Sign up') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
