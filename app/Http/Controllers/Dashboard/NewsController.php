<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('dashboard.news.index');
    }

    public function create()
    {

    }
}
