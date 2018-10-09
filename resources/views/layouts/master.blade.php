<!DOCTYPE html>
<html lang="zh-TW">
@include('layouts.head')
<body>
<div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    @include('layouts.sidebar')
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        @yield('content')
    </main>
    <!-- page-content" -->
</div>
@include('layouts.foot')
</body>

</html>
