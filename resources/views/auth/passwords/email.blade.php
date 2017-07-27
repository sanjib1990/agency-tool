@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b id="form-title"></b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @include("auth.partials.register-form")

            @include("auth.partials.login-form")

            <div class="social-auth-links text-center" style= "display: none;">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-linkedin btn-flat">
                    <i class="fa fa-linkedin"></i> Sign in using Linkedin
                </a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <hr>
            <a href="{!! route('password.request') !!}" id="forgot-password" class="login_links" style= "display: none;">Forgot password</a>
            <a href="{!! route('register') !!}" class="text-center pull-right login_links" id="register" style= "display: none;">Register</a>
            <a href="{!! route('login') !!}" class="login" style= "display: none;">Already a Member</a>

            <div class="login-box-body forgot-password-form">
                @include("auth.partials.forgot-password-form")
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    {!! Form::hidden('show-form', $show, ['id' => "show-form"]) !!}
@endsection

@section('scripts')
    <script src="{!! elixir('js/auth.js') !!}"></script>
@endsection
