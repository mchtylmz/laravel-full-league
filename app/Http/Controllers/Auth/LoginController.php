<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 *
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * @return string
     */
    public function username(): string
    {
        return 'username';
    }

    /**
     * @param Request $request
     * @return array
     */
    public function credentials(Request $request): array
    {
        return array_merge(
            $request->only($this->username(), 'password'),
            array(
                'status' => 1,
                'login'  => 1
            )
        );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showLoginForm()
    {
        // Way 1
        settings()->status = false;

// Way 2
        settings()->set('off_message', 'Maintenance');

// Way 3
        settings()->set([
            'status'        => true,
            'off_message'   => 'Maintenance'
        ]);

// Save all settings
        settings()->save();


        return view('auth.login');
    }
}
