<?php

namespace App\Http\Resources\Admin\Sponsors;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SponsorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photo = view('components.images.full', ['src' => $this->photo?->url])->render();
        $action = view('admin.sponsor.actions', [
            'routeEdit' => route('admin.sponsors.update', $this->id),
            'routeDelete' => route('admin.sponsors.delete', $this->id),
            'messageDelete' => trans('sponsor.delete')
        ])->render();

        return [
            'id' => $this->id,
            'description' => $this->description,
            'link' => $this->link,
            'photo' => $this->photo?->url,
            'photo_html' => $photo,
            'sort' => $this->sort,
            'status' => $this->status,
            'status_html' => $this->status->badge(),
            'type' => $this->type,
            'actions' => $action
        ];
    }
}
