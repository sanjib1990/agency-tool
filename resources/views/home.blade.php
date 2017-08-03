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
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>Project 1</p>
                    <span class="progress-description">
                        <span class="percentage_completed_1">0</span>% Completed
                    </span>
                    <div class="progress">
                        <div class="progress-bar progress_bar_1" style="width: 0%"></div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{!! route('project.show', ['uuid' => 1]) !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>Project 2</p>
                    <span class="progress-description">
                        <span class="percentage_completed_2">0</span>% Completed
                    </span>
                    <div class="progress">
                        <div class="progress-bar progress_bar_2" style="width: 0%"></div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{!! route('project.show', ['uuid' => 1]) !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>Project 3</p>
                    <span class="progress-description">
                        <span class="percentage_completed_3">0</span>% Completed
                    </span>
                    <div class="progress">
                        <div class="progress-bar progress_bar_3" style="width: 0%"></div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open"></i>
                </div>
                <a href="{!! route('project.show', ['uuid' => 1]) !!}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! elixir('js/home.js') !!}"></script>
@stop
