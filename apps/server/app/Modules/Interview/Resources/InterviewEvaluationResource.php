<?php

namespace App\Modules\Interview\Resources;

use App\Modules\Auth\Resources\UserResource;
use App\Modules\Interview\Resources\InterviewResource;
use App\Modules\RatingScale\Resources\RatingScalePointResource;
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
            "createdBy" => UserResource::make($this->whenLoaded("createdBy")),
            "ratingScalePoint" => RatingScalePointResource::make($this->whenLoaded("ratingScalePoint")),
        ];
    }
}
