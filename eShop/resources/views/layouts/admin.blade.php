<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <!-- <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /> -->
    
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <!-- ///// -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Bootstrap CSS -->
    
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- poreuncmnt kori uprer line -->
</head>
<body>
    

    <div class="wrapper ">
        @include('layouts.inc.sidebar')
        
        <div class="main-panel">
            <!-- Navbar -->
            @include('layouts.inc.adminnav')

            <div class="content">
                @yield('content')
            </div>
            
            @include('layouts.inc.adminfooter')
        
        </div>
    </div>


    <!-- Scripts -->
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" ></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}" ></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}" ></script>
    <!--  -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

    @yield('scripts')
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>

</body>
</html>
