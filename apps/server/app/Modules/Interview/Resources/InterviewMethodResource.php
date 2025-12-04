<?php

namespace App\Modules\Interview\Resources;

use App\Modules\Interview\Resources\InterviewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewMethodResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "interviews" => InterviewResource::collection($this->whenLoaded("interviews")),
        ];
    }
}
