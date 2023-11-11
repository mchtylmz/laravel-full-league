@extends('admin.layout.app')

@section('title', __('sponsor.title'))

@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="block-options text-end mb-3">
            <a href="{{ route('admin.sponsors.create') }}" class="btn btn-alt-success px-4">
                <i class="fa fa-plus me-1 opacity-50"></i> {{ __('sponsor.create') }}
            </a>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('sponsor.title') }}</h3>
            </div>
            <div class="block-content">
                <x-bootstrap-table route="{{ route('admin.sponsors.json') }}">
                    <x-slot name="columns">
                        <th data-field="sort" data-sortable="true" data-wdith="5%">{{ __('sponsor.table.sort') }}</th>
                        <th data-field="photo" data-formatter="setHtml">{{ __('sponsor.table.photo') }}</th>
                        <th data-field="description">{{ __('sponsor.table.description') }}</th>
                        <th data-field="link">{{ __('sponsor.table.link') }}</th>
                        <th data-field="type" data-sortable="true">{{ __('sponsor.table.type') }}</th>
                        <th data-field="status" data-sortable="true" data-formatter="setHtml">{{ __('sponsor.table.status') }}</th>
                        <th data-field="id" data-formatter="setActions">{{ __('sponsor.table.actions') }}</th>
                    </x-slot>
                </x-bootstrap-table>
            </div>
        </div>
    </div>
@endsection
