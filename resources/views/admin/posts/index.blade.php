@extends('admin.layout.app')

@section('title', __('post.title'))

@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="block-options text-start mb-3 px-0">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-alt-success px-5">
                <i class="fa fa-plus me-1 opacity-50"></i> {{ __('post.create') }}
            </a>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('post.title') }}</h3>
            </div>
            <div class="block-content">
                <div>
                    sass
                </div>

                <x-bootstrap-table route="{{ route('admin.posts.json') }}">
                    <x-slot name="columns">
                        <th data-field="sort" data-sortable="true" data-width="5%">
                            {{ __('post.table.sort') }}
                        </th>
                        <th data-field="photo" data-formatter="setHtml">
                            {{ __('post.table.photo') }}
                        </th>
                        <th data-field="title" data-width="20%" data-align="left">
                            {{ __('post.table.title') }}
                        </th>
                        <th data-field="published_at" data-sortable="true" data-formatter="setText">
                            {{ __('post.table.published_at') }}
                        </th>
                        <th data-field="status" data-sortable="true" data-formatter="setHtml">
                            {{ __('board.table.status') }}
                        </th>
                        <th data-field="id" data-formatter="setActions">{{ __('board.table.actions') }}</th>
                    </x-slot>
                </x-bootstrap-table>
            </div>
        </div>
    </div>
@endsection
