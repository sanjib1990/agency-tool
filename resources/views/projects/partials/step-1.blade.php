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
            {!! Form::label('start_date', 'Start Date') !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::date('start_date', carbon()->now()->format('Y-m-d'), [
                    'class'         => 'form-control',
                    'id'            => 'start_date',
                    'placeholder'   => 'Start Date',
                    'min'           => carbon()->now()->format('Y-m-d'),
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
            {!! Form::label('end_date', 'End Date') !!}
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::date('end_date', carbon()->now()->addMonths(1)->format('Y-m-d'), [
                    'class'         => 'form-control',
                    'id'            => 'end_date',
                    'placeholder'   => 'End Date',
                    'min'           => carbon()->now()->addMonths(1)->format('Y-m-d'),
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
        {!! Form::button('Next', [
            "id" => "project_info_btn",
            "data-status" => 'INFO_SUBMITTED',
            "class" => "btn btn-primary btn-block btn-flat"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}