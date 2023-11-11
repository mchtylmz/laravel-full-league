<?php

namespace App\Repositories\Admin\Board;


use App\Http\Resources\Admin\Boards\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardRepository
{
    public $data;

    public $count;

    public function all()
    {
        return $this->data = Board::with('members')->get();
    }

    public function search(Request $request)
    {
        $board = Board::withCount('members');

        if ($sort = $request->get('sort')) {
            $board->orderBy($sort, $request->order ?? 'ASC');
        } else {
            $board->orderBy('sort');
        }

        $this->count = $board->count();

        if ($offset = $request->get('offset')) {
            $board->offset($offset);
        }
        if ($limit = $request->get('limit')) {
            $board->limit($limit);
        }

        return $this->data = $board->get();
    }

    public function table(Request $request)
    {
        $data = BoardResource::collection($this->search($request));
        return [
            'rows' => $data,
            'total' => $this->count,
            'totalNotFiltered' => $this->count,
        ];
    }
}
