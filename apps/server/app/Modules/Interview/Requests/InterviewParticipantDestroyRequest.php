<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewParticipantRequest;
use Illuminate\Support\Facades\Gate;

class InterviewParticipantDestroyRequest extends BaseInterviewParticipantRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", $this->getQueriedInterviewParticipantOrFail());
        return true;
    }
}
