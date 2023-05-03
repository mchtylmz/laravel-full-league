<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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

        $post = Post::first();
        $post->is_home = 1;
        $post->save();

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

    public function user(User $user)
    {
        dd($user->email);
    }
}
