{!! Form::open(['id' => 'step-2-form']) !!}
<div class="form-group has-feedback">
    {!! Form::text('title', null, [
        'class'         => 'form-control',
        'id'            => 'title',
        'placeholder'   => 'Requirment Title',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group has-feedback">
    {!! Form::textarea('requirment_desc', null, [
        'class'         => 'form-control',
        'id'            => 'requirment_desc',
        'placeholder'   => 'Requirment Description',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
<div class="form-group has-feedback">
    {!! Form::file('requirment_upload', [
        'class'         => 'form-control',
        'id'            => 'title',
        'placeholder'   => 'Requirment Title',
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
{!! Form::close() !!}