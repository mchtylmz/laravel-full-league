@extends('admin.layout.app')

@section('title', __('profile.title') . ' - ' . admin()->name)

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ assets()->admin('media/profile.jpg') }}');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="my-3">
                    <x-images.profile src="{{ admin()->role()?->name }}"/>
                </div>
                <h1 class="h2 text-white mb-0">{{ admin()->name }}</h1>
                <h2 class="h4 fw-normal text-white-75">
                    {{ admin()->role()?->name }}
                </h2>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <div class="content">
        <div class="row">
            <div class="col-lg-6 order-2 order-sm-1">
                <!-- User Profile -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">User Profile</h3>
                    </div>
                    <div class="block-content">
                        <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-username">Username</label>
                                <input type="text" class="form-control" id="one-profile-edit-username" name="one-profile-edit-username" placeholder="Enter your username.." value="john.parker">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-name">Name</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="one-profile-edit-name" placeholder="Enter your name.." value="John Parker">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="one-profile-edit-email" name="one-profile-edit-email" placeholder="Enter your email.." value="john.parker@example.com">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="mb-4">
                                    <img class="img-avatar" src="assets/media/avatars/avatar13.jpg" alt="">
                                </div>
                                <div class="mb-4">
                                    <label for="one-profile-edit-avatar" class="form-label">Choose a new avatar</label>
                                    <input class="form-control" type="file" id="one-profile-edit-avatar">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END User Profile -->
            </div>
            <div class="col-lg-6 order-1 order-sm-2">
                <!-- Change Password -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('profile.change_password.title') }}</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.profile.password.save') }}" method="POST" data-toggle="ajax">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="password">{{ __('profile.change_password.current') }}</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="****" minlength="6" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="newpassword">{{ __('profile.change_password.new') }}</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" autocomplete="off" placeholder="****" minlength="6" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="newpassword_confirmation">{{ __('profile.change_password.confirm') }}</label>
                                <input type="password" class="form-control" id="newpassword_confirmation" name="newpassword_confirmation" autocomplete="off" placeholder="****" minlength="6" required>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-save fw-bold mx-2"></i> {{ __('profile.change_password.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Change Password -->
            </div>
        </div>
    </div>

@endsection
