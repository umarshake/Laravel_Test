<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>@yield('title')</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/build/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/ladda/dist/ladda-themeless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fooTable/css/footable.core.min.css') }}" />
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/bootstrap-multiselect.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
        $(document).ready(function(){
            toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
             $('[data-toggle="tooltip"]').tooltip();

        });
    </script>

</head>
<body class="fixed-navbar fixed-sidebar">
    <!-- Simple splash screen-->
    <div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Project Name </h1><p>Site Detail </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
    <!--[if lt IE 7]>
    <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    @include('includes.header')
    @include('includes.sidebar')
    <!-- Main Wrapper -->
    <div id="wrapper">

    @yield('content')
    @include('includes.footer')
    </div>
</body>

    <!-- Vendor scripts -->
    
    <script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('vendor/sparkline/index.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- DataTables buttons scripts -->
    <script src="{{ asset('vendor/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/media/js/fnFilterOnReturn.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validate.bootstrap-tooltip.js') }}"></script>
    <script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('vendor/ladda/dist/spin.min.js') }}"></script>
    <script src="{{ asset('vendor/ladda/dist/ladda.min.js') }}"></script>
    <script src="{{ asset('vendor/ladda/dist/ladda.jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/fooTable/dist/footable.all.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('scripts/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('scripts/jscolor.js') }}"></script>
    
    <!-- App scripts -->
    <script src="{{ asset('scripts/homer.js') }}"></script>
    @stack('scripts')
</html>


