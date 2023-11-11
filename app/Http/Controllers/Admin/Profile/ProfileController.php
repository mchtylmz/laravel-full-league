<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\StorePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function save()
    {

    }

    public function password(StorePasswordRequest $request)
    {
        $user = auth()->user();

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return response()->json([
            'message' => trans('profile.change_password.success')
        ]);
    }
}
