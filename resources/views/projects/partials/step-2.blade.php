<div class="col-md-12">
    <div class="pull-right">
        {!! Form::button('Add Requirment', [
            "id"                    => "requirments_btn",
            "data-toggle"           => "modal",
            "data-target"           => "#requirement-modal",
            "class"                 => "btn btn-primary btn-block",
            "data-controls-modal"   => "#requirement-modal",
            "data-backdrop"         => "static",
            "data-keyboard"         => "false"
        ]) !!}
    </div>
</div>
<br>
<hr>

<div class="col-md-12">
    <div class="row">
        <div class="row">
            <div class="col-md-1">
                #Edit
            </div>
            <div class="text-center col-md-3 bold">
                Title
            </div>
            <div class="col-md-4 text-center bold">
                Description
            </div>
            <div class="col-md-4 text-center bold">
                Image
            </div>
        </div>
        <hr>
    </div>
    <div class="requirment-list">
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-success edit-requirment" data-uuid="2"><i class="fa fa-eye"></i> Edit</button>
            </div>
            <div class="text-center col-md-3 requirment-title-2 crop">
                Requirment Title 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="col-md-4 text-center requirment-desc-2 crop">
                Requirment Description Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="col-md-4 text-center requirment-url-2">
                Requirment Url
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-1">
                <button class="btn btn-success edit-requirment" data-uuid="1"><i class="fa fa-eye"></i> Edit</button>
            </div>
            <div class="text-center col-md-3 requirment-title-1 crop">
                Requirment Title 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="col-md-4 text-center requirment-desc-1 crop">
                Requirment Description Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="col-md-4 text-center requirment-url-1">
                Requirment Url
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="pull-right">
        {!! Form::button('Next', [
            "id"                    => "requirments_next_btn",
            "data-status"           => 'REQUIRMENT_SUBMITTED',
            "class"                 => "btn btn-primary btn-block",
        ]) !!}
    </div>
</div>

@include("projects.partials.requirement-modal")
