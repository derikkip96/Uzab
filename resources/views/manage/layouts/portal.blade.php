@extends('manage.layouts.app')

@section('body-class')
    fix-header card-no-border fix-sidebar
@endsection

@section('dashboard-layout')
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
    @include('manage.partials.top-bar')
    <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
    @include('manage.partials.left-sidebar')
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid r-aside">
                <!-- Bread crumb and right sidebar toggle -->
            @yield('breadcrumb-heading')
            <!-- End Bread crumb and right sidebar toggle -->

                <!-- Page Content -->
            @yield('content')
            <!-- End Page Content -->
            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer"> © {{ date('Y') }} Ecommerce </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
@endsection