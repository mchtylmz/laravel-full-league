<?php

namespace app\Repositories\Admin\Board;


use App\Http\Resources\Admin\Boards\BoardMemberResource;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberRepository
{
    public $data;

    public function all()
    {
        return $this->data = BoardMember::with('board')->get();
    }

    public function search(Request $request)
    {
        $board = BoardMember::with('board');

        if ($search = $request->get('search')) {
            $board->where(function ($query) use($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('surname', 'LIKE', '%' . $search . '%')
                    ->orWhere('mission_tr', 'LIKE', '%' . $search. '%')
                    ->orWhere('mission_en', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('board', function ($query) use($search) {
                        return $query
                            ->where('title_tr', 'LIKE', '%' . $search . '%')
                            ->orWhere('title_en', 'LIKE', '%' . $search . '%');
                    });
            });
        }
        if ($board_id = $request->get('board_id')) {
            $board->where('board_id', $board_id);
        }
        if ($offset = $request->get('offset')) {
            $board->offset($offset);
        }
        if ($limit = $request->get('limit')) {
            $board->limit($limit);
        }
        if ($sort = $request->get('sort')) {
            $board->orderBy($sort, $request->order ?? 'ASC');
        } else {
            $board->orderBy('sort');
        }

        return $this->data = $board->get();
    }

    public function table(Request $request)
    {
        $data = BoardMemberResource::collection($this->search($request));
        return [
            'rows' => $data,
            'total' => $data->count(),
            'totalNotFiltered' => $data->count(),
        ];
    }
}
