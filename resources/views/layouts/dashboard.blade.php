<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')}}" />

    {{-- title name --}}
    <title>Dashboard Bgecko</title>
</head>

<body>
    {{-- container scroller --}}
    <div class="container-scroller">
        {{-- navbar section --}}
        @include('admin.partials.navbar')

        {{-- container --}}
        <div class="container-fluid page-body-wrapper">
            {{-- sidebar section --}}
            @include('admin.partials.sidebar')

            {{-- main section --}}
            @yield('content')
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js')}}/chart.umd.js')}}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{ asset('admin/js/misc.js')}}"></script>
    <script src="{{ asset('admin/js/settings.js')}}"></script>
    <script src="{{ asset('admin/js/todolist.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
</body>

</html>