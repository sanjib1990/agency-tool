{!! Form::open(['id' => 'step-2-form']) !!}
<div class="form-group {{ $errors->has('fname') ? 'has-error' : 'has-feedback' }}">
    {!! Form::text('fname', old('fname'), [
        'class'         => 'form-control',
        'id'            => 'fname',
        'placeholder'   => 'First name',
        'required'      => true
    ]) !!}
    @if ($errors->has('fname'))
        <span class="help-block">
            <strong>{{ $errors->first('fname') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('lname') ? 'has-error' : 'has-feedback' }}">
    {!! Form::text('lname', old('lname'), [
        'class'         => 'form-control',
        'id'            => 'lname',
        'placeholder'   => 'Last name',
        'required'      => true
    ]) !!}
    @if ($errors->has('lname'))
        <span class="help-block">
            <strong>{{ $errors->first('lname') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-feedback' }}">
    {!! Form::email('email', old('email'), [
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
        {!! Form::button('Step 3', [
            "data-status" => config('project.project_status_order')[1],
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}