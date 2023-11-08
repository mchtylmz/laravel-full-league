<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="projekthaus" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ assets()->admin(config('admin.login.logo')) }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ assets()->admin('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ assets()->admin('css/oneui.min.css') }}">
</head>
<body>
<div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center" style="background-image: url('{{ assets()->admin('media/bg.png') }}')">
            <div class="w-100">
                <!-- Sign In Section -->
                <div class="bg-body-extra-light">
                    <div class="content content-full">
                        <div class="row g-0 justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                                <!-- Header -->
                                <div class="text-center">
                                    <p class="mb-3">
                                        <img src="{{ assets()->admin(config('admin.login.logo')) }}" />
                                    </p>
                                    <h1 class="h4 mb-2">
                                        {{ __('auth.login.title') }}
                                    </h1>
                                </div>
                                <!-- END Header -->

                                <form class="validation-signin" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="py-3">
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="username" name="username" placeholder="{{ __('auth.login.username') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="{{ __('auth.login.password') }}" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-xxl-5">
                                            <button type="submit" class="btn w-100 btn-alt-primary">
                                                <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('auth.login.submit') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Sign In Section -->

                <!-- Footer -->
                <div class="fs-sm text-center text-muted py-3">
                    <strong>{{ config('app.name') }} </strong> &copy; <span data-toggle="year-copy"></span>
                </div>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->
<script>
    const lang = {
        ok: '{{ __('auth.login.ok') }}'
    };
</script>
<script src="{{ assets()->admin('js/oneui.app.min.js') }}"></script>
<script src="{{ assets()->admin('js/lib/jquery.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/jquery-validation/localization/messages_tr.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ assets()->admin('js/pages/auth.js') }}"></script>
</body>
</html>
