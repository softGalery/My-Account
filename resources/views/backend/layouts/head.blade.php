<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--favicon-->

    <link rel="icon" href="{{ asset('/backend/assets/images/favicon-32x32.png' ) }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('/backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    {{--    <link href="{{ asset('/backend/assets/css/pace.min.css') }}" rel="stylesheet" />--}}
    {{--    <script src="{{ asset('/backend/assets/js/pace.min.js') }}"></script>--}}
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('/backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/dataTables.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/assets/css/toastify.min.css') }}" />

    <!--Datatable -->
    <script src="{{ asset('/backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
    <title>Small Firm's Account</title>
</head>
