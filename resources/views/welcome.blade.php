@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="card my-3">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                Kategori {{ $post->category->name }}
                            </p>
                            <p class="card-text">
                                {{ $post->description }}
                            </p>
                            <a href="{{ route('post.detail', [$post->slug]) }}" class="btn btn-primary">Detay</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

@endsection
