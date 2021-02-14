<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">

        <ul class="side-menu metismenu nav nav-pills nav-sidebar flex-column">
            <li class="mt-2">
                <a href="{{route('home')}}" class="{{ (request()->is('home')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li class="nav-item">
                <a href="{{route('product-orders.index')}}" class="{{ (request()->is('product-orders*')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-shopping-cart"></i>
                    <span class="nav-label">Product Order</span></a>
            </li>
            <li>
                <a href="{{route('customers.index')}}"class="{{ (request()->is('customers*')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-user-friends"></i>
                    <span class="nav-label">Customers</span></a>
            </li>
            <li>
                <a href="{{route('cities.index')}}" class="{{ (request()->is('cities*')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-map-marker"></i>
                    <span class="nav-label">Cities</span></a>
            </li>
            <li>
                <a href="{{route('branches.index')}}" class="{{ (request()->is('branches*')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-code-branch"></i>
                    <span class="nav-label">Branchase</span></a>
            </li>
            
            <li>
                <a href="{{route('users.index')}}" class="{{ (request()->is('users*')) ? 'active nav-link' : '' }}"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users</span></a>
            </li>
            {{-- <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Basic UI</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="colors.html">Colors</a>
                    </li>
                    <li>
                        <a href="colors.html">Colors</a>
                    </li>

                </ul>
            </li> --}}

        </ul>
    </div>
</nav>