<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }} | {{ $siteTitle ?? '' }}</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ dashboard_asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ dashboard_asset('assets/media/favicons/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ dashboard_asset('assets/media/favicons/favicon.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ dashboard_asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ dashboard_asset('assets/css/oneui.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ dashboard_asset('assets/css/style.css') }}">

    @livewireStyles
</head>
<body>

<div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="w-100">
                @yield('content')
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>

<script src="{{ dashboard_asset('assets/js/oneui.app.min.js') }}"></script>
<!-- jQuery (required for jQuery Validation plugin) -->
<script src="{{ dashboard_asset('assets/js/lib/jquery.min.js') }}"></script>
<!-- Page JS Plugins -->
<script src="{{ dashboard_asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@livewireScripts
<x-livewire-alert::scripts />

@stack('js')
</body>
</html>
