<?php

namespace App\Http\Resources\Admin\Boards;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
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
            'title_tr' => $this->title_tr,
            'title_en' => $this->title_en,
            'photo' => $this->photo,
            'photo_html' => view('components.images.avatar', ['src' => $this->photo])->render(),
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'members' => $this->members,
            'members_count' => $this->members->count(),
            'actions' => view('admin.board.actions', ['board' => $this])->render()
        ];
    }
}
