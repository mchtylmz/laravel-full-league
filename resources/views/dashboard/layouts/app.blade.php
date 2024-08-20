<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }} {{ (!empty($title) ? '| ' : '') . $siteTitle }}</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset($siteFavicon) }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset($siteFavicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($siteFavicon) }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ dashboard_asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ dashboard_asset('assets/js/plugins/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ dashboard_asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ dashboard_asset('assets/js/plugins/bootstrap-select/dist/css/bootstrap-select.css') }}" />

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ dashboard_asset('assets/css/oneui.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ dashboard_asset('assets/css/style.css') }}?v={{ config('dashboard.version') }}">
    <style>
        .nav-link.active {
            background-color: #2356d7 !important;
            color: #FFF !important;
        }
        [x-cloak] { display: none !important; }
    </style>

    @livewireStyles
    @stack('css')
</head>
<body>
<div id="page-container" class="page-header-light main-content-full">
    <!-- <div id="page-loader" class="show"></div> -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="{{ route('dashboard.home.index') }}">
                    <img src="{{ asset($siteLogo) }}" class="header-logo" alt="logo">
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <div class="d-none d-sm-flex align-items-center">
                @includeIf('dashboard.layouts.menu')
            </div>

            <!-- Right Section -->
            <div class="d-flex align-items-center">
                @includeIf('dashboard.layouts.user-menu')
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-lighter">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @includeIf('dashboard.layouts.menu', ['mobile' => true])

        <!-- Page Content -->
        <div class="content pt-3">
            @yield('content')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


    <!-- Footer -->
    <footer id="page-footer" class="bg-body-extra-light">
        <div class="content py-3">
            <div class="row fs-sm">
                <div class="col-sm-12 py-0 text-center">
                    {{ $siteTitle  }} &copy; {{ now()->year }}
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<script src="{{ asset('dashboard/assets/js/oneui.app.min.js') }}"></script>
<!-- jQuery (required for jQuery Validation plugin) -->
<script src="{{ asset('dashboard/assets/js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('dashboard/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/jquery-validation/localization/messages_tr.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/flatpickr/l10n/tr.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/bootstrap-select/dist/js/i18n/defaults-tr_TR.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/app.js') }}?v={{ config('dashboard.version') }}"></script>
<script src="https:://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@livewireScripts
<x-livewire-alert::scripts />
@stack('js')

<script>
    Livewire.hook('element.init', ({ component, el }) => {
        console.log(component.name, el.value);
        $('.dropify').dropify();
        $('.selectpicker').selectpicker('Ankara');


        if (component.name === "your_component_name") { //component.name is products.show in my case
            // code..
        }
    })
</script>

</body>
</html>
