<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login', [
            'title' => __('Giriş Yap')
        ]);
    }

    public function store(LoginRequest $request)
    {
        $isLogin = LoginAction::run(
            email: $request->validated('email'),
            password: $request->validated('password'),
            remember: $request->boolean('remember')
        );
        if (!$isLogin) {
            return redirect()->back()->with('message', __('Kullanıcı adı / parola hatalı!'));
        }

        return redirect()->route('admin.home.index');
    }
}
