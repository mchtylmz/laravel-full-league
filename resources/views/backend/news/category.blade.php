@extends('backend.layouts.app')

@section('content')
    <!-- block -->
    <div class="block block-rounded">
        <!-- block-header -->
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>

            <div class="block-options">
                @can('boards:add')
                    <button type="button"
                            onclick="Livewire.dispatch('showOffcanvas', {component: 'news.category-form', data: {size: 'lg', title: '{{ __('Kategori Ekle') }}' }})"
                            class="btn btn-success px-4">
                        <i class="fa fa-fw fa-plus mx-1"></i> {{ __('Kategori Ekle') }}
                    </button>
                @endcan
            </div>
        </div>
        <!-- block-content -->
        <div class="block-content fs-sm pb-3">
            <livewire:news.category-table />
        </div>
        <!-- block-content -->
    </div>
    <!-- block -->
@endsection
