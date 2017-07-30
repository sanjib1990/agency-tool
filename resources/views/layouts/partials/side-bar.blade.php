<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! auth()->user()->avatar !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{!! auth()->user()->fname.' '.auth()->user()->lname !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{!! route('home') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li >
                <a href="{!! route('project.create') !!}">
                    <i class="fa fa-plus-square"></i>
                    <span>Add Project</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>