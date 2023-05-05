<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {

        auth()->user()->setMeta('deneme' , 'value');

        $user = User::find(2);
        $user->setMeta('deneme', 'value');

        debug(
            auth()->user()->getMetas(),
            auth()->user()->hasMeta('deneme'),
            User::whereMeta('deneme', 'value')->get(),
            User::withMeta()->get()
        );

        return view('admin.index');
    }
}
