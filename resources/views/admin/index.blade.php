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


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">GEÇMİŞ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">GELECEK</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        @foreach($fixturesPast as $fixture)
                            Sezon: {{ $fixture->season->name }}
                            <br>
                            Lig: {{ $fixture->league->name }}
                            <br>
                            Hafta: {{ $fixture->week->name }}
                            <br>
                            <div class="d-flex gap-2">
                                {{ $fixture->homeTeam->name }} <h3>{!! $fixture->result?->home !!}</h3> - <h3>{!! $fixture->result?->away !!}</h3> {{ $fixture->awayTeam->name }}
                            </div>
                            <br>
                            {{ $fixture->date }} {{ $fixture->time }}

                            <hr>
                        @endforeach

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        @foreach($fixturesUpComing as $fixture)
                            Sezon: {{ $fixture->season->name }}
                            <br>
                            Lig: {{ $fixture->league->name }}
                            <br>
                            Hafta: {{ $fixture->week->name }}
                            <br>
                            <div class="d-flex gap-2">
                                {{ $fixture->homeTeam->name }} <h3>{!! $fixture->result?->home !!}</h3> - <h3>{!! $fixture->result?->away !!}</h3> {{ $fixture->awayTeam->name }}
                            </div>
                            <br>
                            {{ $fixture->date }} {{ $fixture->time }}

                            <hr>
                        @endforeach
                    </div>
                </div>



            </div>

        </div>

    </div>

@endsection
