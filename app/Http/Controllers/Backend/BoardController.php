<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return view('backend.boards.index', [
            'title' => __('Kurullar')
        ]);
    }
}