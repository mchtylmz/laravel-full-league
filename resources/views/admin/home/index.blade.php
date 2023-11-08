@extends('admin.layout.app')

@section('title', __('home.title'))

@section('content')


    @foreach($boards as $board)
        {{ $board->title_tr }}
        <br>
        @foreach($board->members as $member)

            - {{ $member->first_name }} - <br>
        @endforeach

        <hr>

        <br>

    @endforeach


@endsection
