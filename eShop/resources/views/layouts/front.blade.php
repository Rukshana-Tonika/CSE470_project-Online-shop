<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')  
    </title>
 
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <!-- <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /> -->
    
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

    <!-- ///// -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- poreuncmnt kori uprer line -->
    
    <!-- font awesome theke collected -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- font awsm again -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

</head>
<body>
    
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/custom.js') }}" ></script>

    
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
