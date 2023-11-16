@extends('admin.layout.app')

@section('title', __('post.update'))

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('post.update') }} - {{ $post->title }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" data-toggle="ajax">
                    @csrf
                    @include('components.forms.post', ['post' => $post])
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
