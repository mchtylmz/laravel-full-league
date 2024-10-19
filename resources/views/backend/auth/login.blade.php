@extends('backend.layouts.app')

@section('content')
    <!-- Sign In Section -->
    <div class="bg-body-extra-light">
        <div class="content content-full">
            <div class="row g-0 justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                    <!-- Header -->
                    <div class="text-center">
                        <p class="mb-3">
                            <img src="{{ asset($siteLogo) }}" class="login-logo" alt="logo"/>
                        </p>
                        <h3>{{ settings()->loginTitle ?? $title }}</h3>
                    </div>
                    <!-- END Header -->

                    @livewire('auth.login')
                </div>
            </div>
        </div>
    </div>
    <!-- END Sign In Section -->
@endsection
