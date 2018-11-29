<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <span class="text-center text-white">
                    Ecommerce
                </span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">
                <!-- Search -->
                <li class="nav-item hidden-xs-down search-box">
                    <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-search"></i>
                    </a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
                <!-- Profile -->
                @if(\Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('pro/images/user.png') }}" alt="user" class="profile-pic"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-text">

                                        <h4>{{ \Auth::user()->name }}</h4>
                                        <p class="tet-muted">{{ \Auth::user()->email }}</p>

                                    </div>
                                </div>
                            </li>

                            <li role="separator" class="divider"></li>
                            <li role="separator" class="divider"></li>

                            <li>
                                <a href="{{ route('merchant.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('merchant.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
