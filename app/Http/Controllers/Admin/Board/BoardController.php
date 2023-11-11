<?php

namespace App\Http\Controllers\Admin\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return view('admin.board.index');
    }

    public function json(Request $request)
    {
        return response()->json(repositories('board')->table($request));
    }
}
