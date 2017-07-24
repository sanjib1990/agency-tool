@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

{!! Form::open(['route' => 'password.email', 'id' => 'forgot-password-form']) !!}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::email('email', old('email'), [
        'id'            => 'email',
        "placeholder"   => 'Registered Email',
        "class"         => "form-control",
        'required'      => true
    ]) !!}

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::button('Send Password Reset Link', [
        "type"  => "submit",
        "class" => "btn btn-primary form-control"
    ]) !!}
</div>
{!! Form::close() !!}

<div class="text-center">
    <p>- OR -</p>
    <a href="{!! route('login') !!}" class="back_login btn btn-success form-control">Login</a>
</div>