<?php

namespace App\Modules\Interview\Resources;

use App\Modules\Interview\Resources\InterviewResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewEvaluationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "comment" => $this->comment,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "interview" => InterviewResource::make($this->whenLoaded("interview")),
            "createdBy" => InterviewResource::make($this->whenLoaded("createdBy")),
            "ratingScalePoint" => InterviewResource::make($this->whenLoaded("ratingScalePoint")),
        ];
    }
}
