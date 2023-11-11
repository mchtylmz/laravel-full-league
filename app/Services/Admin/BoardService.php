<?php

namespace app\Services\Admin;

use App\Http\Requests\Admin\Board\StoreRequest;
use App\Models\Board;

class BoardService
{
    public function save(StoreRequest $request, Board $board)
    {
        $board->title_tr = $request->title_tr;
        $board->title_en = $request->title_en;
        $board->sort = $request->sort;
        $board->status = $request->status;
        $board->save();

        if ($request->hasFile('photo')) {
            $photo = upload($request->photo);
            if ($photo && $photo->id) {
                $board->upload_id = $photo->id;
            }
        }

        $board->save();

        return $board;
    }
}
