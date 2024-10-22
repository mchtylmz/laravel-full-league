@extends('backend.layouts.app')

@section('content')
    <!-- block -->
    <div class="block block-rounded">
        <!-- block-header -->
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $informationType->name }}</h3>
        </div>
        <!-- block-content -->
        <div class="block-content fs-sm pb-3">
            @livewire('information.form', ['informationType' => $informationType])
        </div>
        <!-- block-content -->
    </div>
    <!-- block -->
@endsection
