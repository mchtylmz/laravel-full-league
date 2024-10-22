<?php

namespace App\Actions\Boards;

use App\Models\Board;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateOrUpdateBoardAction
{
    use AsAction;

    public function handle(array $data, ?Board $board = null)
    {
        if (is_null($board)) {
            $board = Board::create($data);
        } else {
            $board->update($data);
        }

        return $board;
    }
}
