@extends('backend.layouts.app')

@section('content')
    <!-- block -->
    <div class="block block-rounded">
        <!-- block-header -->
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>

            <div class="block-options">
                @can('news:add')
                    <a type="button" class="btn btn-success px-4" href="{{ route('admin.news.create') }}">
                        <i class="fa fa-fw fa-plus mx-1"></i> {{ __('Haber Ekle') }}
                    </a>
                @endcan
            </div>
        </div>
        <!-- block-content -->
        <div class="block-content fs-sm pb-3">
            <livewire:news.news-table />
        </div>
        <!-- block-content -->
    </div>
    <!-- block -->
@endsection
