@extends('admin.layout.app')

@section('title', __('menu.sidebar.files'))

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-loader" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
        <x-files route="{{ route('admin.settings.files.json') }}"/>
    </div>
@endsection
