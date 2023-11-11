@extends('admin.layout.app')

@section('title', __('board.members.title'))

@section('content')

    <!-- Page Content -->
    <div class="content">

        <div class="row g-2 mb-3 align-items-center block-content p-0">
            <div class="col-lg-8 pb-3">
                <select class="js-select2 form-select" name="board_id" data-onchange="table" data-table="#boardMembersTable">
                    <option value="">{{ __('board.all') }}</option>
                    @foreach(repositories('board')->all() as $board)
                        <option value="{{ $board->id }}">{{ $board->title_tr }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 block-options text-end mb-0 pb-3">
                <a href="{{ route('admin.boards.members.create') }}" class="btn btn-alt-primary px-4">
                    <i class="fa fa-user-plus me-1 opacity-50"></i> {{ __('board.members.create') }}
                </a>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('board.members.title') }}</h3>
            </div>
            <div class="block-content">
                <x-bootstrap-table id="boardMembersTable" route="{{ route('admin.boards.members.json', request()->query()) }}">
                    <x-slot name="columns">
                        <th data-field="sort" data-sortable="true">{{ __('board.table.sort') }}</th>
                        <th data-field="photo" data-formatter="setHtml">{{ __('board.table.photo') }}</th>
                        <th data-field="name">{{ __('board.table.name') }}</th>
                        <th data-field="surname">{{ __('board.table.surname') }}</th>
                        <th data-field="mission_tr">{{ __('board.table.mission_tr') }}</th>
                        <th data-field="mission_en">{{ __('board.table.mission_en') }}</th>
                        <th data-field="board_title_tr">{{ __('board.table.board') }}</th>
                        <th data-field="status" data-sortable="true" data-formatter="setHtml">{{ __('board.table.status') }}</th>
                        <th data-field="id" data-formatter="setActions">{{ __('board.table.actions') }}</th>
                    </x-slot>
                </x-bootstrap-table>
            </div>
        </div>
    </div>

@endsection
