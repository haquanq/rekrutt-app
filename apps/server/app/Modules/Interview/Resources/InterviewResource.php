<?php

namespace App\Modules\Interview\Resources;

use App\Modules\Auth\Resources\UserResource;
use App\Modules\RatingScale\Resources\RatingScaleResource;
use App\Modules\Recruitment\Resources\RecruitmentApplicationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "scheduled_start_at" => $this->scheduled_start_at,
            "scheduled_end_at" => $this->scheduled_end_at,
            "started_at" => $this->started_at,
            "ended_at" => $this->ended_at,
            "cancelled_at" => $this->cancelled_at,
            "cancellation_note" => $this->cancellation_note,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "application" => RecruitmentApplicationResource::make($this->whenLoaded("application")),
            "method" => InterviewMethodResource::make($this->whenLoaded("method")),
            "createdBy" => UserResource::make($this->whenLoaded("createdBy")),
            "cancelledBy" => UserResource::make($this->whenLoaded("cancelledBy")),
            "ratingScale" => RatingScaleResource::make($this->whenLoaded("ratingScale")),
            "evaluations" => InterviewEvaluationResource::make($this->whenLoaded("evaluations")),
            "participants" => UserResource::make($this->whenLoaded("interviewers")),
        ];
    }
}
