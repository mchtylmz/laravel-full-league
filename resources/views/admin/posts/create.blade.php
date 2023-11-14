@extends('admin.layout.app')

@section('title', __('post.create'))

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('post.create') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.posts.create') }}" method="POST" data-toggle="ajax">
                    @csrf
                    @include('components.forms.news')
                    <div class="mt-3 mb-4 text-center">
                        <button type="submit" class="btn btn-alt-primary px-5">
                            <i class="fa fa-save fw-bold mx-2"></i> {{ __('post.form.create_submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
