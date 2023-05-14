@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card my-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">
                Kategori {{ $post->category->name }}
            </p>
            <hr>
            <p class="card-text">
                {{ $post->description }}
            </p>
            {!! $post->content !!}
        </div>
    </div>

</div>

@endsection
