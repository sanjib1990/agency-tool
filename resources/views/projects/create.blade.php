@extends('layouts.app')

@section('styles')
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
                           class="project_info project_info_tab"
                           data-toggle="tab">
                            Project Info
                        </a>
                    </li>
                    <li>
                        <a href="#tab_2"
                           class="disabled requirments requirments_tab"
                           data-toggle="tab">
                            Requirments
                        </a>
                    </li>
                    <li>
                        <a href="#tab_3"
                           class="disabled project_progress project_progress_tab"
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
                        <div class="steps">
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

    @include('layouts.partials.project-status-order')
@stop

@section('scripts')
    <script>
        $(function() {
            $('#file_upload').fileupload({
                dataType: 'json',
                headers: jwtHeader(),
                done: function (e, data) {
                    console.log(data.result);
                    hideLoader();
                },
                fail: function(e, data) {
                    ajaxErrorLogout(data.jqXHR.status);
                }
            });

            $("#project_info_btn").on('click', function () {
                $(".requirments_tab").removeClass('disabled').trigger('click');
            });
        });
    </script>
@stop