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
                    @impersonating
                        <a href="{{ route('simulation.impersonate_leave') }}" style="color:#ffffff;text-decoration: none" onclick="return confirm('確定返回原本帳琥？')">
                            <i class="fas fa-chevron-left text-warning"></i>
                            <span>結束模擬</span></a>
                    @endImpersonating
                        </span>
            </div>

        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
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
        @auth
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>系統功能</span>
                </li>
                    <?php
                        $sidebar = get_sidebar(auth()->user());
                    ?>
                    @foreach($sidebar as $k=>$v)
                        <li>
                            <a href="{{ route('main',$v['id']) }}">
                                <i class="fa fa-folder"></i>
                                <span>{{ $v['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                <li>
                    <a href="{{ route('other') }}">
                        <i class="fas fa-th-large"></i>
                        <span>全部授權模組</span>
                    </a>
                </li>
            </ul>
        </div>
        @endauth
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <div class="dropdown">
            <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php $this_seme = get_curr_seme(); ?>
                <i class="fas fa-calendar-alt"></i> {{ $this_seme['name'] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                <a class="dropdown-item" href="">今天日期：{{ date('Y-m-d') }}</a>
                <a class="dropdown-item" href="">現在時刻：{{ date('H:i') }}</a>
                <a class="dropdown-item" href="">結休業式：{{ $this_seme['stop_date'] }}</a>
            </div>
        </div>
    </div>
</nav>
