<?php

namespace App\Http\Controllers\Admin\Board;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Board\StoreRequest;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return view('admin.board.index');
    }

    public function create()
    {
        return view('admin.board.create');
    }

    public function store(StoreRequest $request)
    {
        services('board')->save($request, new Board());

        return response()->json([
            'message' => trans('board.form.success'),
            'redirectTo' => route('admin.boards')
        ]);
    }

    public function update(Board $board)
    {
        return view('admin.board.update', compact('board'));
    }

    public function save(StoreRequest $request, Board $board)
    {
        services('board')->save($request, $board);

        return response()->json([
            'message' => trans('board.form.success'),
            'redirectTo' => route('admin.boards')
        ]);
    }

    public function delete(Board $board)
    {
        if (!$board->delete()) {
            return response()->json([
                'message' => trans('board.form.delete_error')
            ], 422);
        }

        return response()->json([
            'message' => trans('board.form.delete_success')
        ]);
    }

    public function json(Request $request)
    {
        return response()->json(repositories('board')->table($request));
    }
}
