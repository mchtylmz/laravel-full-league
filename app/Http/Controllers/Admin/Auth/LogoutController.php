<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        services('auth')->logout();
        return redirect()->route('admin.login');
    }
}
