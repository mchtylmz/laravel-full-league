@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
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
                    {{ $team->stadium?->name }}

                    <hr>
                @endforeach
            </div>


            <div class="col-lg-4">
                Fixture
                <hr>
                @foreach($fixtures as $fixture)
                    Sezon: {{ $fixture->season->name }}
                    <br>
                    Lig: {{ $fixture->league->name }}
                <br>
                Hafta: {{ $fixture->week->name }}
                <br>
                    {{ $fixture->homeTeam->name }} - {{ $fixture->awayTeam->name }}
                <br>
                {{ $fixture->date }} {{ $fixture->time }}

                    <hr>
                @endforeach
            </div>

        </div>

    </div>

@endsection
