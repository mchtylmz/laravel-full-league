<?php

namespace App\Http\Resources\Admin\Boards;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'photo' => $this->photo,
            'photo_html' => view('components.images.avatar', ['src' => $this->photo])->render(),
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'mission_tr' => $this->mission_tr,
            'mission_en' => $this->mission_en,
            'board_title_tr' => $this->board->title_tr,
            'actions' => view('admin.board.actions', ['member' => $this])->render()
        ];
    }
}
