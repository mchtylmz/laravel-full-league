<?php

namespace App\Http\Resources\Admin\Tools;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'hash' => $this->hash,
            'size' => $this->size,
            'extension' => $this->extension,
            'updated_at' => $this->updated_at->format('Y-m-d H:i'),
            'url' => $this->url()
        ];
    }
}
