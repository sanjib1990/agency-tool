@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b id="form-title">Register</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @include("auth.partials.register-form")

            @include("auth.partials.social-login")

            <hr>
            <a href="{!! route('login') !!}" class="login" style= "display: none;">Already a Member</a>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('scripts')
    <script src="{!! elixir('js/register.js') !!}"></script>
@endsection
