<?php

namespace App\Modules\Interview\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewParticipantResourceCollection extends JsonResource
{
    public $collects = InterviewParticipantResource::class;
}
