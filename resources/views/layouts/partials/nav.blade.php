<!-- START HEADER-->
<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">Delivery
                <span class="brand-tip">_System</span>
            </span>
            <span class="brand-mini">DS</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            <li>
                <form class="navbar-search" action="javascript:;">
                    <div class="rel">
                        <span class="search-icon"><i class="ti-search"></i></span>
                        <input class="form-control" placeholder="Search here...">
                    </div>
                </form>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">

            <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell rel"><span
                        class="notify-signal"></span></i></a>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                <li class="dropdown-menu-header">
                    <div>
                        <span><strong>5 New</strong> Notifications</span>
                        <a class="pull-right" href="javascript:;">view all</a>
                    </div>
                </li>
                <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                    <div>
                        <a class="list-group-item">
                            <div class="media">
                                <div class="media-img">
                                    <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                </div>
                                <div class="media-body">
                                    <div class="font-13">4 task compiled</div><small class="text-muted">22
                                        mins</small>
                                </div>
                            </div>
                        </a>

                    </div>
                </li>
            </ul>
            </li>
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="./assets/img/admin-avatar.png" />
                    <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>

                    <li class="dropdown-divider"></li>

                    {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fa fa-power-off"></i>Logout</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->