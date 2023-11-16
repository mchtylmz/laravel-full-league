<?php

namespace App\Http\Resources\Admin\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photo = view('components.image', [
            'type' => 'thumb',
            'src' => $this->photo?->url
        ])->render();
        $action = view('components.actions', [
            'type' => 'post',
            'messageDelete' => trans('post.delete'),
            'post' => $this
        ])->render();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'photo' => $this->photo?->url,
            'photo_html' => $photo,
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'published_at' => $this->published_at,
            'published_at_text' => localeDate($this->published_at),
            'actions' => $action
        ];
    }
}
