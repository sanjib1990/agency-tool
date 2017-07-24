@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b id="form-title">Reset Password</b>
        </div>
        <div class="login-box-body forgot-password-form">
            @include("auth.partials.reset-password-form")
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('scripts')
    <script src="{!! elixir('js/reset-password.js') !!}"></script>
@endsection
