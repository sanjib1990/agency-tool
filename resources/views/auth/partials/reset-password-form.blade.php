@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
{!! Form::open(['route' => 'password.request', 'id' => 'reset-password-form']) !!}
<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-feedback' }}">
    {!! Form::email('email', $email or old('email'), [
        'class'         => 'form-control',
        'id'            => 'email',
        'placeholder'   => 'Email',
        'required'      => true
    ]) !!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-feedback' }}">
    {!! Form::password('password', [
        'class'         => 'form-control',
        'id'            => 'password',
        'placeholder'   => 'Password',
        'required'      => true
    ]) !!}
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : 'has-feedback' }}">
    {!! Form::password('password_confirmation', [
        'class'         => 'form-control',
        'id'            => 'password_confirmation',
        'placeholder'   => 'Confirm Password',
        'required'      => true
    ]) !!}
    @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>
<div class="row">
    <div class="col-md-4 pull-right">
        {!! Form::button('Reset', [
            "type"  => "submit",
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
</div>
{!! Form::hidden('token', $token) !!}
{!! Form::close() !!}