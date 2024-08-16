@extends('dashboard.layouts.auth')

@section('content')
    <!-- Sign In Section -->
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <div class="row g-0 justify-content-center">
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 py-3 px-3 px-lg-3 text-center">
                    <div class="d-flex justify-content-center gap-2 mt-3 pt-3">
                        <!-- Header -->
                        <div class="text-center mb-2">
                            <img src="{!! asset($siteLogo) !!}" class="login-logo" alt="Logo" style="max-width: 150px">
                        </div>
                        <!-- END Header -->
                    </div>

                    <livewire:auth.login />

                </div>
            </div>
        </div>
    </div>
    <!-- END Sign In Section -->
@endsection
