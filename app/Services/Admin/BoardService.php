<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\Board\StoreMemberRequest;
use App\Http\Requests\Admin\Board\StoreRequest;
use App\Models\Board;
use App\Models\BoardMember;

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
    public function memberSave(StoreMemberRequest $request, BoardMember $member)
    {
        $member->board_id = $request->board_id;
        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->mission_tr = $request->mission_tr;
        $member->mission_en = $request->mission_en;
        $member->grid = $request->grid;
        $member->sort = $request->sort;
        $member->status = $request->status;
        $member->save();

        if ($request->hasFile('photo')) {
            $photo = upload($request->photo);
            if ($photo && $photo->id) {
                $member->upload_id = $photo->id;
            }
        }

        $member->save();

        return $member;
    }

    public function delete(Board $board)
    {
        return $board->delete();
    }

    public function memberDelete(BoardMember $boardMember)
    {
        return $boardMember->delete();
    }
}
