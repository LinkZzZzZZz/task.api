<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'due_date' => $this->due_date?->format('d.m.Y H:m'),
            'created_at' => $this->created_at->format('d.m.Y H:m'),
            'updated_at' => $this->updated_at->format('d.m.Y H:m')
        ];
    }
}
