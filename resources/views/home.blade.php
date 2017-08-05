@extends('layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="col-lg-6 col-xs-6 text-size-20">
                Your projects
            </div>
            <div class="col-lg-6 col-xs-6">
                <a href="{!! route('project.create') !!}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add Project</a>
            </div>
        </div>
        <hr>
    </div>
    <div class="row project_list">

    </div>
</div>
@stop

@section('scripts')
    <script id="project_list_template" type="text/template">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>###name</p>
                    <br><br>
                    <span class="progress-description" id="###uuid" data-status="###stage">
                        <span class="percentage_completed_###uuid">###percentage</span>% Completed
                    </span>
                    <div class="progress">
                        <div class="progress-bar progress_bar_###uuid"></div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{!! route('project.show', ['uuid' => "###uuid"]) !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </script>
    <script type="text/javascript" src="{!! elixir('js/home.js') !!}"></script>
@stop
