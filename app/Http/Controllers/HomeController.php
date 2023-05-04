<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Post;
use App\Models\User;
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
        $post->featured = 1;
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

        $posts = Post::type('post')->get();
        $pages = Post::type('page')->get();

        return view('home', [
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }

    public function user(User $user)
    {
        dd($user->email);
    }

    public function index1()
    {
        //auth()->user()->clearImages();
        return view('index1', [
            'images' => auth()->user()->images
        ]);
    }

    public function index2(StoreUserRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();

        $user->addImage($request->file);

        $user->email = $request->email;
        $user->save();

        return view('index1', [
            'images' => $user->images
        ]);
    }
}
