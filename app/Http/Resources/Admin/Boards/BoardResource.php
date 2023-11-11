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
        $photo = view('components.images.avatar', ['src' => $this->photo?->url])->render();
        $action = view('admin.board.actions', [
            'routeEdit' => route('admin.boards.update', $this->id),
            'routeDelete' => route('admin.boards.delete', $this->id),
            'messageDelete' => trans('board.delete')
        ])->render();

        return [
            'id' => $this->id,
            'title_tr' => $this->title_tr,
            'title_en' => $this->title_en,
            'photo' => $this->photo?->url,
            'photo_html' => $photo,
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'members' => $this->members,
            'members_count' => $this->members->count(),
            'actions' => $action
        ];
    }
}
