{!! Form::open(['id' => 'step-1-form']) !!}
<div class="form-group {{ $errors->has('fname') ? 'has-error' : 'has-feedback' }}">
    {!! Form::text('fname', old('fname'), [
        'class'         => 'form-control',
        'id'            => 'fname',
        'placeholder'   => 'First name',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group {{ $errors->has('lname') ? 'has-error' : 'has-feedback' }}">
    {!! Form::text('lname', old('lname'), [
        'class'         => 'form-control',
        'id'            => 'lname',
        'placeholder'   => 'Last name',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-feedback' }}">
    {!! Form::email('email', old('email'), [
        'class'         => 'form-control',
        'id'            => 'email',
        'placeholder'   => 'Email',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-feedback' }}">
    {!! Form::password('password', [
        'class'         => 'form-control',
        'id'            => 'password',
        'placeholder'   => 'Password',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::date('start_date', null, [
                    'class'         => 'form-control',
                    'id'            => 'start_date',
                    'placeholder'   => 'Start Date',
                    'required'      => true,
                ]) !!}
                <span class="error-block help-block">
                    <strong class="error-message"></strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::date('end_date', null, [
                    'class'         => 'form-control',
                    'id'            => 'end_date',
                    'placeholder'   => 'End Date',
                    'required'      => true
                ]) !!}
                <span class="error-block help-block">
                    <strong class="error-message"></strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 pull-right">
        {!! Form::button('Step 2', [
            "data-status" => config('project.project_status_order')[0],
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}