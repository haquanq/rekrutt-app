<?php

namespace App\Modules\Interview\Resources;

use App\Modules\Auth\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewParticipantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "note" => $this->note,
            "interview" => InterviewResource::make($this->whenLoaded("interview")),
            "participant" => UserResource::make($this->whenLoaded("participant")),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
