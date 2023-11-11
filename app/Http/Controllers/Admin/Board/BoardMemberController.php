<?php

namespace App\Http\Controllers\Admin\Board;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index()
    {
        return view('admin.board.members.index');
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function update(BoardMember $boardMember)
    {
        dump($boardMember);
    }

    public function save(BoardMember $boardMember)
    {

    }

    public function json(Request $request)
    {
        return response()->json(repositories('boardMembers')->table($request));
    }
}
