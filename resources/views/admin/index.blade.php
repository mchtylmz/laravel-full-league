@extends('layouts.app')

@section('content')
    <div class="container">

        {{ auth()->user()->name }}
        <hr>
        @foreach($users as $user)
            {{ $user->people?->first_name }} {{ $user->people?->last_name }}
            <br>
            {{ $user->role->name }} - {{ $user->role->code }}

            <hr>
        @endforeach

        <hr>

        Takım
        <hr>
        @foreach($teams as $team)
            {{ $team->name }}
            <br>
            {{ $team->stadium->name }}

            <hr>
        @endforeach

    </div>

@endsection
