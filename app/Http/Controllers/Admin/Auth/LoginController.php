<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\StoreLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login', [
            'title' => trans('auth.login.title')
        ]);
    }

    public function login(StoreLoginRequest $request)
    {
        $auth = services('auth')->login($request->username, $request->password);
        if (!$auth) {
            return response()->json([
                'message' => __('auth.login.error')
            ], 422);
        }

        return response()->json([
            'message' => __('auth.login.success'),
            'redirectTo' => route('admin.home')
        ]);
    }
}
