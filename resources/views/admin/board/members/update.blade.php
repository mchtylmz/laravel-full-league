@extends('admin.layout.app')

@section('title', __('board.members.update'))

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('board.members.update') }} - {{ $boardMember->name }} {{ $boardMember->surname }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.boards.members.update', $boardMember->id) }}" method="POST" data-toggle="ajax">
                    @csrf
                    @include('admin.board.forms.member', ['member' => $boardMember])
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-alt-primary px-5">
                            <i class="fa fa-save fw-bold mx-2"></i> {{ __('board.form.create_submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
