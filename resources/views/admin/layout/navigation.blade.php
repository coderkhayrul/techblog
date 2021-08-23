<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/back') }}"><img src="{{ asset('upload/others/'.$share_data['admin_logo']) }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ url('/back') }}"><img src="{{ asset('upload/others/'.$share_data['admin_logo']) }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/back') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @permission(['Category List', 'All'])
                <li class="active">
                    <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Categories </a>
                </li>
                @endpermission
                @permission(['Post List', 'All'])
                <li class="active">
                    <a href="{{ route('post.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Post </a>
                </li>
                @endpermission
                @permission(['Permissions List', 'All'])
                    <li class="active">
                        <a href="{{ route('permission.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Permissions </a>
                    </li>
                @endpermission
                @permission(['Role List', 'All'])
                    <li class="active">
                        <a href="{{ route('role.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Roles </a>
                    </li>
                @endpermission
                @permission(['Author List', 'All'])
                <li class="active">
                    <a href="{{ route('author.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Authrs </a>
                </li>
                @endpermission

                @permission(['System Setting', 'All'])
                <li class="active">
                    <a href="{{ route('setting.edit') }}"> <i class="menu-icon fa fa-dashboard"></i>Settings </a>
                </li>
                @endpermission

                {{-- <h3 class="menu-title">UI elements</h3> --}}
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                        <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li> --}}
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
