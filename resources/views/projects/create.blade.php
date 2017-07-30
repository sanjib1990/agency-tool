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
                    <li class="active"><a href="#tab_1" class="step_1" data-toggle="tab">Step 1</a></li>
                    <li><a href="#tab_2" class="disabled step_2" area-disabled data-toggle="tab">Step 2</a></li>
                    <li><a href="#tab_3" class="disabled step_3" data-toggle="tab">Step 3</a></li>
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
    @include('layouts.partials.upload-input')
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
        });
    </script>
@stop