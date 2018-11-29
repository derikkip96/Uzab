<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ecommerce</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('pro/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pro/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('pro/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- page css -->
    @yield('page-css')
    <!-- Custom CSS -->
    <link href="{{ asset('pro/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('pro/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-control {
            min-height: 42px;
        }
        .select2-container--default {
            border: 1px solid #ced4da;
        }
        .input-group-btn {
            border:  1px solid #ced4da;
        }
    </style>
</head>

<body class="@yield('body-class')">

<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">ecommerce</p>
    </div>
</div>
@yield('dashboard-layout')
@yield('other-pages')
<!-- All Jquery -->
<script src="{{ asset('pro/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('pro/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('pro/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pro/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('pro/js/waves.js') }}"></script>
<script src="{{ asset('pro/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('pro/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('pro/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- page level scripts -->
@yield('page-scripts')
<!--Custom JavaScript -->
@if(old('modal') !== null)
    <script type="application/javascript">
        $(function() {
            $('#{{ old('modal')}}').modal('show');
        });
    </script>
@endif
<script src="{{ asset('pro/js/custom.min.js') }}"></script>
<script src="{{ asset('pro/js/sidebar.min.js') }}"></script>
<script src="{{ asset('pro/plugins/toast-master/js/jquery.toast.js') }}"></script>
</body>
</html>
