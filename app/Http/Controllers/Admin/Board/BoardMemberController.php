<?php

namespace App\Http\Controllers\Admin\Board;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Board\StoreMemberRequest;
use App\Models\Board;
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
        return view('admin.board.members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        services('board')->memberSave($request, new BoardMember());

        return response()->json([
            'message' => trans('board.form.success'),
            'redirectTo' => route('admin.boards.members.index')
        ]);
    }

    public function update(BoardMember $boardMember)
    {
        return view('admin.board.members.update', compact('boardMember'));
    }

    public function save(StoreMemberRequest $request, BoardMember $boardMember)
    {
        services('board')->memberSave($request, $boardMember);

        return response()->json([
            'message' => trans('board.form.success'),
            'redirectTo' => route('admin.boards.members.index')
        ]);
    }

    public function delete(BoardMember $boardMember)
    {
        if (!services('board')->memberDelete($boardMember)) {
            return response()->json([
                'message' => trans('board.form.delete_member_error')
            ], 422);
        }

        return response()->json([
            'message' => trans('board.form.delete_member_success')
        ]);
    }

    public function json(Request $request)
    {
        return response()->json(repositories('boardMembers')->table($request));
    }
}
