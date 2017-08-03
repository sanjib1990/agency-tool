{!! Form::open(['id' => 'step-2-form']) !!}
<div class="form-group has-feedback">
    {!! Form::text('search_developer', null, [
        'class'         => 'form-control search_developer',
        'id'            => 'search_developer',
        'placeholder'   => 'Search Developer',
        'required'      => true
    ]) !!}
    <span class="error-block help-block">
        <strong class="error-message"></strong>
    </span>
</div>
{!! Form::close() !!}