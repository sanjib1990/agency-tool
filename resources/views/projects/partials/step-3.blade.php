<br>
<div class="col-md-12">
    <!-- The time line -->
    <ul class="timeline">
        <li class="time-label">
          <span class="bg-red">
            10 Feb. 2014
          </span>
        </li>
        <li>
            <i class="fa fa-exclamation bg-red-active"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Assign to Development Team</h3>
                <div class="col-md-12 timeline-body assigned_dev">
                    No Development team assigned yet.
                </div>
                <div class="timeline-footer">
                    {!! Form::button('Assign Development Team', [
                        "id"                    => "assign_to_dev",
                        "data-toggle"           => "modal",
                        "data-target"           => "#assign-dev-modal",
                        "class"                 => "btn btn-primary btn-xs assign_to_dev",
                        "data-controls-modal"   => "#assign-dev-modal",
                        "data-backdrop"         => "static",
                        "data-keyboard"         => "false"
                    ]) !!}
                    {!! Form::button('Remove', [
                        "id"            => "assign_to_dev",
                        'data-status'   => 'REQUIRMENT_SUBMITTED',
                        "class"         => "btn btn-danger btn-xs remove_dev",
                    ]) !!}
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        <li class="time-label">
          <span class="bg-green">
            3 Jan. 2014
          </span>
        </li>
        <!-- timeline item -->
        <li>
            <i class="fa fa-clock-o bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Client - Requirment Sign off</h3>
                <div class="timeline-body no-border">
                    Requirment To Signed Off by Client
                    <button class="btn btn-success btn-flat btn-xs client_sign_off_btn"
                            data-status="SIGNED_OFF_CLIENT">
                        Client Sign Off
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'client_sign_off'
                    ])
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        <li class="time-label">
          <span class="bg-green">
            3 Jan. 2014
          </span>
        </li>
        <li class="">
            <i class="fa fa-check bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Dev - Requirment sign Off</h3>
                <div class="timeline-body no-border">
                    Requirment signed off By Dev
                    <button class="btn btn-success btn-flat btn-xs dev_sign_off_btn"
                            data-status="SIGNED_OFF_DEVELOPER">
                        Developer Sign Off
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'dev_sign_off'
                    ])
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        <li class="time-label">
          <span class="bg-green">
            3 Jan. 2014
          </span>
        </li>
        <li>
            <i class="fa fa-check bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Requirment Freezed</h3>
                <div class="timeline-body no-border">
                    Requirment freezed by Mr. Frank
                    <button class="btn btn-success btn-flat btn-xs requirement_freeze_btn"
                            data-status="FREEZED_REQUIREMENT">
                        Freeze Requirement
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'requirment_freezed'
                    ])
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        <li class="time-label">
          <span class="bg-green">
              Development Started on 3 Jan. 2014
          </span>
        </li>

        <!-- timeline item -->
        <li>
            <i class="fa fa-check bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Development Started</h3>
                <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                    <button class="btn btn-success btn-flat btn-xs dev_start_btn"
                            data-status="WORK_PROGRESS">
                        Start Development
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'development_started'
                    ])
                </div>
            </div>
        </li>
        <li class="time-label">
          <span class="bg-green">
            QA Testing started on 3 Jan. 2014
          </span>
        </li>
        <li>
            <i class="fa fa-check bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">QA Testing</h3>
                <div class="timeline-body no-border">
                    Given for QA
                    <button class="btn btn-success btn-flat btn-xs given_to_qa_btn"
                            data-status="QA_TESTED">
                        Start QA
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'given_for_qa'
                    ])
                </div>
            </div>
        </li>
        <li class="time-label">
          <span class="bg-green">
            QA Testing Done on 3 Jan. 2014
          </span>
        </li>
        <li>
            <i class="fa fa-check bg-green"></i>
            <div class="timeline-item">
                <span class="time">
                    <i class="fa fa-clock-o"></i>
                    <span class="time-human-diff">2017-08-03T09:28:22.751Z</span>
                </span>
                <h3 class="timeline-header">Deploy</h3>
                <div class="timeline-body no-border">
                    Deploy on a server
                    <button class="btn btn-success btn-flat btn-xs deployed_btn"
                            data-status="DEPLOYED">
                        Deployed
                    </button>
                </div>
                <div class="timeline-footer">
                    @include("projects.partials.comment_section", [
                        'for'   => 'deployed_server'
                    ])
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        <li class="time-label">
          <span class="bg-green">
              Deployed on 3 Jan. 2014
          </span>
        </li>
        <li>
            <i class="fa fa-stop bg-yellow"></i>
        </li>
    </ul>
</div>

@include("projects.partials.assign-dev-modal")
