@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{!! elixir('css/project.css') !!}">
@stop

@section('content-header')
    Project Create
@stop

@section('content')
    <div class="row">
        @include('layouts.partials.progress-bar')

        <div class="col-lg-12 col-md-12 col-xs-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1"
                           class="tab_click project_info project_info_tab"
                           id="project_info_tab"
                           data-toggle="tab">
                            Project Info
                        </a>
                    </li>
                    <li>
                        <a href="#tab_2"
                           class="tab_click {!! @$show ? '' : 'disabled' !!} requirments requirments_tab"
                           id="requirments_tab"
                           data-toggle="tab">
                            Requirments
                        </a>
                    </li>
                    <li>
                        <a href="#tab_3"
                           class="tab_click {!! @$show ? '' : 'disabled' !!} project_progress project_progress_tab"
                           id="project_progress_tab"
                           data-toggle="tab">
                            Progress
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="steps">
                            @include('projects.partials.step-1')
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="">
                            @include('projects.partials.step-2')
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="steps">
                            @include('projects.partials.step-3')
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>

    <script type="text/template" id="comment-template">
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="###userImage" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>###userName</b></a> made a post.
                        </div>
                        <h6 class="text-muted time time-human-diff">###time</h6>
                    </div>
                </div>
                <div class="post-description">
                    <p>###comment</p>
                </div>
            </div>
        </div>
</script>

@stop

@section('scripts')
    <script type="text/javascript" src="{!! elixir('js/project.js') !!}"></script>
@stop