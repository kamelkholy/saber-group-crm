<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=0.8, minimal-ui">
    <meta content="SABER GROUP CRM" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <link href="{{asset('/public/css/morris.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/alertify.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/jquery.nestable.css')}}" rel="stylesheet">

    <link href="{{asset('/public/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/responsive.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/public/css/new-style.css')}}" rel="stylesheet">


    <!-- App Icons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/public/pic/SABER.png')}}">

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">


        @yield('sabercrm')



    </div>


    <script src="{{ asset('/public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/public/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/public/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('/public/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('/public/js/waves.js') }}"></script>
    <script src="{{ asset('/public/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('/public/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/public/js/morris.min.js')}}"></script>
    <script src="{{ asset('/public/js/raphael-min.js') }}"></script>
    <script src="{{ asset('/public/js/dashboard.js') }}"></script>
    <script src="{{ asset('/public/js/alertify.js') }}"></script>
    <script src="{{ asset('/public/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/public/js/sweet-alert.init.js') }}"></script>



    <script src="{{ asset('/public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/public/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/public/js/jquery.nestable.js') }}"></script>
    <script src="{{ asset('/public/js/nestable-init.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('/public/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/public/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/public/js/jszip.min.js') }}"></script>
    <script src="{{ asset('/public/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/public/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/public/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/public/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/public/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('/public/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/public/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('/public/js/datatables.init.js') }}"></script>

    <!--- Text Editor --->
    <script src="{{ asset('/public/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('/public/js/texteditor.js') }}"></script>
    <script src="{{ asset('/public/js/app.js') }}"></script>
    <script src="{{ asset('/public/js/mainJS.js') }}"></script>



</body>

</html>