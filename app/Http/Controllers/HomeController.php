<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *w
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // Way 1
        $user->settings->multilingual = true;

// Way 2
        $user->settings->set('notifiable', true);

// Way 3
        $user->settings->set([
            'multilingual'  => true,
            'notifiable'    => true,
        ]);

// Save all settings
        $user->settings->save();

        debug('deneme');

        return view('home');
    }
}
