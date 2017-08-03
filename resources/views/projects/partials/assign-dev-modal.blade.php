<div class="modal fade" id="assign-dev-modal" tabindex="-1" role="dialog" aria-labelledby="assign-dev-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Assign Project To</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @include("projects.partials.assign-dev-form")
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary dev_select">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
