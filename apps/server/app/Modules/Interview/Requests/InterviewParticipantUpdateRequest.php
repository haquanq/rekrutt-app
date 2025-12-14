<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewParticipantRequest;
use Illuminate\Support\Facades\Gate;

class InterviewParticipantUpdateRequest extends BaseInterviewParticipantRequest
{
    public function authorize(): bool
    {
        Gate::authorize("update", $this->getQueriedInterviewParticipantOrFail());
        return true;
    }
}
