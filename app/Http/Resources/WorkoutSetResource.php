<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutSetResource extends JsonResource
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
            'workout_detail_id' => $this->workout_detail_id,
            'set_number' => $this->set_number,
            'reps' => $this->reps,
            'weight' => $this->weight,
            'created_at' => $this->created_at->toIsoString(),
            'updated_at' => $this->updated_at->toIsoString(),
        ];
    }
}
