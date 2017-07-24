{!! Form::open(['route' => 'login', 'id' => 'login-form']) !!}
<div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback' }}">
    {!! Form::email('email', old('email'), [
        'id'            => 'email',
        'placeholder'   => 'EMAIL',
        "class"         => "form-control",
        'required'      => true,
        'autofocus'     => true
    ]) !!}
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('password') ? ' has-error' : 'has-feedback' }}">
    {!! Form::password('password', [
        'id'            => 'password',
        "placeholder"   => 'Password',
        "class"         => "form-control",
        'required'      => true
    ]) !!}

    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="row">
    <div class="col-xs-8">
        <div class="checkbox icheck">
            <label>
                {!! Form::checkbox('remember', 1, old('remember'), ['class' => 'minimal']) !!} Remember Me
            </label>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        {!! Form::button('Sign In', [
            "id"    => "login_btn",
            "type"  => "submit",
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
    <!-- /.col -->
</div>
{!! Form::close() !!}