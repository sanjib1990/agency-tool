@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b id="form-title">Send Password Link</b>
        </div>
        <div class="login-box-body forgot-password-form">
            @include("auth.partials.forgot-password-form")
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#forgot-password-form").validate();
    </script>
    <script src="{!! elixir('js/forgot-password.js') !!}"></script>
@endsection
