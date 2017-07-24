@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b id="form-title">Login</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @include("auth.partials.login-form")

            <!-- /.social-auth-links -->
            @include("auth.partials.social-login")
            <hr>
            <a href="{!! route('password.request') !!}" id="forgot-password" class="login_links">Forgot password</a>
            <a href="{!! route('register') !!}" class="text-center pull-right login_links" id="register">Register</a>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#login-form").validate();
    </script>
@endsection
