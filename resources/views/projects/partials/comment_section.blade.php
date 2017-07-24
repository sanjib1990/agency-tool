<span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
<button class="btn btn-warning btn-flat btn-xs"
        data-toggle="collapse"
        href="#{!! $for !!}_collapse"
        aria-expanded="false"
        aria-controls="collapseExample">
    View comment
</button>
<button class="btn btn-success btn-flat btn-xs add_comment" data-identifier="{!! $for !!}">
    <i class="fa fa-comments-o"></i>
</button>
<div class="collapse" id="{!! $for !!}_collapse">
    <div class="{!! $for !!}-comment-list">
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>Ryan Haywood</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time time-human-diff">2017-08-03T09:22:18.270Z</h6>
                    </div>
                </div>
                <div class="post-description">
                    <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>Ryan Haywood</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time time-human-diff">2017-08-03T09:22:18.270Z</h6>
                    </div>
                </div>
                <div class="post-description">
                    <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <br>
        <button class="btn btn-default btn-sx"><i class="fa fa-plus"></i> More</button>
    </div>
</div>
