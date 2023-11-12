@extends('admin.layout.app')

@section('title', __('home.title'))

@section('content')


    @foreach(\App\Models\Season::all() as $season)
        {{ $season->name }}
        <br>
        {!! dump($season->leagues) !!}

        <hr>

        <br>

    @endforeach


@endsection
