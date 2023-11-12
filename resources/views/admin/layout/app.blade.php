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
    <link rel="stylesheet" href="{{ assets()->admin('js/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ assets()->admin('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ assets()->admin('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ assets()->admin('css/oneui.min.css') }}">
    <link rel="stylesheet" href="{{ assets()->admin('css/style.css') }}">
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
<script>
const locale = '{{ app()->getLocale() }}';
const lang = @php echo json_encode(trans('enum'), JSON_PRETTY_PRINT); @endphp;
</script>
<script src="{{ assets()->admin('js/oneui.app.min.js') }}"></script>
<script src="{{ assets()->admin('js/lib/jquery.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/jquery-validation/localization/messages_tr.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/flatpickr/l10n/tr.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/select2/js/i18n/tr.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Custom -->
<script src="{{ assets()->admin('js/app.js') }}"></script>
<script>
    One.helpersOnLoad(['js-flatpickr', 'jq-select2', 'jq-masked-inputs']);
</script>
@stack('scripts')
</body>
</html>
