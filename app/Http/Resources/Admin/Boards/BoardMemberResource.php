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
        $photo = view('components.image', [
            'type' => 'avatar',
            'src' => $this->photo?->url
        ])->render();
        $action = view('components.actions', [
            'routeEdit' => route('admin.boards.members.update', $this->id),
            'routeDelete' => route('admin.boards.members.delete', $this->id),
            'messageDelete' => trans('board.members.delete')
        ])->render();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'photo' => $this->photo,
            'photo_html' => $photo,
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'mission_tr' => $this->mission_tr,
            'mission_en' => $this->mission_en,
            'board_title_tr' => $this->board->title_tr,
            'actions' => $action
        ];
    }
}
