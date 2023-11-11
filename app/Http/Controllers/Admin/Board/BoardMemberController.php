<?php

namespace App\Http\Controllers\Admin\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index()
    {
        return view('admin.board.members');
    }

    public function json(Request $request)
    {
        return response()->json(repositories('boardMembers')->table($request));
    }
}
