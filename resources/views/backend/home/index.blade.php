@extends('backend.layouts.app')

@section('content')
    <!-- Overview -->
    <div class="row items-push">
        <div class="col-sm-6 col-xxl-3">
            @livewire('home.statistics', ['section' => 'users'])
        </div>
    </div>
    <!-- END Overview -->
@endsection
