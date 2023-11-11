@extends('admin.layout.app')

@section('title', __('board.title'))

@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="block-options text-end mb-3">
            <a href="{{ route('admin.boards.create') }}" class="btn btn-alt-success px-4">
                <i class="fa fa-plus me-1 opacity-50"></i> {{ __('board.create') }}
            </a>
            <a href="{{ route('admin.boards.members.create') }}" class="btn btn-alt-primary px-4">
                <i class="fa fa-user-plus me-1 opacity-50"></i> {{ __('board.members.create') }}
            </a>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('board.title') }}</h3>
            </div>
            <div class="block-content">
                <x-bootstrap-table search="false" route="{{ route('admin.boards.json') }}">
                    <x-slot name="columns">
                        <th data-field="sort" data-sortable="true" data-wdith="5%">{{ __('board.table.sort') }}</th>
                        <th data-field="photo" data-formatter="setHtml">{{ __('board.table.photo') }}</th>
                        <th data-field="title_tr">{{ __('board.table.title_tr') }}</th>
                        <th data-field="title_en">{{ __('board.table.title_en') }}</th>
                        <th data-field="members_count" data-sortable="true">{{ __('board.table.members_count') }}</th>
                        <th data-field="status" data-sortable="true" data-formatter="setHtml">{{ __('board.table.status') }}</th>
                        <th data-field="id" data-formatter="setActions">{{ __('board.table.actions') }}</th>
                    </x-slot>
                </x-bootstrap-table>
            </div>
        </div>
    </div>
@endsection
