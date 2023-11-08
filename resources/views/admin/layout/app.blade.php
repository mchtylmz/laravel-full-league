<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="projekthaus" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ assets()->admin(config('admin.logo')) }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ assets()->admin('css/oneui.min.css') }}">
    <style>
        .admin-logo {
            height: 48px;
        }
    </style>
    @stack('styles')
</head>
<body>
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-full">
    <!-- Sidebar -->
    @include('admin.layout.sidebar')
    <!-- END Sidebar -->
    <!-- Header -->
    @include('admin.layout.header')
    <!-- END Header -->
    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->
    <!-- Footer -->
    @include('admin.layout.footer')
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<script src="{{ assets()->admin('js/oneui.app.min.js') }}"></script>
@stack('scripts')
</body>
</html>
