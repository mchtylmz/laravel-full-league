@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>


<h2>POST</h2>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-lg-3">
                {{ $post->title }}
                <br>
                {{ $post->type->label() }}
            </div>
        @endforeach
    </div>

    <hr>

    <h2>PAGE</h2>
    <div class="row">
        @foreach($pages as $page)
            <div class="col-lg-3">
                {{ $page->title }}
                <br>
                {{ $page->type->label() }}
            </div>
        @endforeach
    </div>

</div>
@endsection
