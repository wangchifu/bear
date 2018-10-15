<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        @auth
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="{{ asset('pro_sidebar_template/assets/img/user.jpg') }}" alt="User picture">
            </div>
            <div class="user-info">
                        <span class="user-name">
                            <i class="fa fa-circle text-success"></i> {{ auth()->user()->name }}
                        </span>
                <span class="user-role">{{ auth()->user()->username }}</span>
                <span class="user-status">
                    <a href="#" style="color:#ffffff;text-decoration: none" onclick="if(confirm('您確定登出嗎?')) $('#logout-form').submit();else return false">
                            <i class="fa fa-sign-out-alt text-danger"></i>
                            <span>登出</span>
                        </a>
                        </span>

            </div>
        </div>
        @endauth
        @guest
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>登入狀態</span>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>登入</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endguest
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        <span class="badge badge-pill badge-danger">New</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Dashboard 1
                                    <span class="badge badge-pill badge-success">Pro</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="#">Dashboard 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>E-commerce</span>
                        <span class="badge badge-pill badge-primary">3</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Products

                                </a>
                            </li>
                            <li>
                                <a href="#">Orders</a>
                            </li>
                            <li>
                                <a href="#">Credit cart</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-gem"></i>
                        <span>Components</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">General</a>
                            </li>
                            <li>
                                <a href="#">Panels</a>
                            </li>
                            <li>
                                <a href="#">Tables</a>
                            </li>
                            <li>
                                <a href="#">Icons</a>
                            </li>
                            <li>
                                <a href="#">Forms</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Pie chart</a>
                            </li>
                            <li>
                                <a href="#">Line chart</a>
                            </li>
                            <li>
                                <a href="#">Bar chart</a>
                            </li>
                            <li>
                                <a href="#">Histogram</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Maps</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Google maps</a>
                            </li>
                            <li>
                                <a href="#">Open street map</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('teachers_manage.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>教師管理</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('school_setup.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>學校設定</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('modules_manage.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>模組權限管理</span>
                    </a>
                </li>
                <li class="header-menu">
                    <span>額外</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>.......</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Examples</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Documentation</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <div class="dropdown">

            <a href="#" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                <div class="notifications-header">
                    <i class="fa fa-bell"></i>
                    Notifications
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="fas fa-check text-success border border-success"></i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                            <div class="notification-time">
                                6 minutes ago
                            </div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="fas fa-exclamation text-info border border-info"></i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                            <div class="notification-time">
                                Today
                            </div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="notification-content">
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                        </div>
                        <div class="content">
                            <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                            <div class="notification-time">
                                Yesterday
                            </div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all notifications</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <div class="dropdown-menu messages" aria-labelledby="dropdownMenuMessage">
                <div class="messages-header">
                    <i class="fa fa-envelope"></i>
                    Messages
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <img src="{{ asset('pro_sidebar_template/assets/img/user.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                        </div>
                    </div>

                </a>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <img src="{{ asset('pro_sidebar_template/assets/img/user.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                        </div>
                    </div>

                </a>
                <a class="dropdown-item" href="#">
                    <div class="message-content">
                        <div class="pic">
                            <img src="{{ asset('pro_sidebar_template/assets/img/user.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="message-title">
                                <strong> Jhon doe</strong>
                            </div>
                            <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="#">View all messages</a>

            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                <a class="dropdown-item" href="#">My profile</a>
                <a class="dropdown-item" href="#">Help</a>
                <a class="dropdown-item" href="#">Setting</a>
            </div>
        </div>
        @auth
            <div>
                <a href="#" onclick="if(confirm('您確定登出嗎?')) $('#logout-form').submit();else return false">
                    <i class="fa fa-power-off text-danger"></i>
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>
</nav>
