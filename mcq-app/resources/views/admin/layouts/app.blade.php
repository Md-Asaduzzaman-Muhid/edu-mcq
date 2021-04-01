<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Board</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('css/fontawesome/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" {{url('css/overlayscrol/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{url('css/summernote-bs4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
        
            @include('admin.layouts.header')
          
            @yield('content')
            
            @include('admin.layouts.footer')

        </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('js/OverlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <!-- <script src="dist/js/demo.js"></script> -->

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{url('js/jquery.mousewheel.js')}}"></script>
    <script src="{{url('js/raphael.min.js')}}"></script>
    <script src="{{url('js/jquery.mapael.min.js')}}"></script>
    <script src="{{url('js/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{url('js/Chart.min.js')}}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{url('js/dashboard2.js')}}"></script>
    <script src="{{url('js/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
    </body>
</html>
