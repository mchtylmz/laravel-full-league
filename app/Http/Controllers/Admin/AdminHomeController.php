<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\Role;
use App\Models\Season;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminHomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {



        return view('admin.index', [
            'users' => User::with(['people', 'role'])->get(),
            'teams' => Team::all(),
            'fixturesUpComing' => Fixture::with(['season', 'league', 'week', 'homeTeam', 'awayTeam'])->upComing()->get(),
            'fixturesPast' => Fixture::with(['season', 'league', 'week', 'homeTeam', 'awayTeam'])->past()->get(),
        ]);
    }
}
