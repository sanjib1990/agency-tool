{!! Form::open(['id' => 'step-1-form']) !!}
<div class="form-group has-feedback">
    {!! Form::text('name', null, [
        'class'         => 'form-control',
        'id'            => 'name',
        'placeholder'   => 'Project name',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group has-feedback">
    {!! Form::textarea('description', null, [
        'class'         => 'form-control',
        'id'            => 'description',
        'placeholder'   => 'Short Summary about the project',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="row text-center">
    - <p class="text-size-20">Timelines</p> -
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
            "id" => "project_info_btn",
            "data-status" => config('project.project_status_order')[0],
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}