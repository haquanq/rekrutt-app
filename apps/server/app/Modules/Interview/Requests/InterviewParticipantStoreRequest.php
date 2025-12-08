<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewParticipantRequest;
use App\Modules\Interview\Models\Interview;
use App\Modules\Interview\Models\InterviewParticipant;
use Illuminate\Support\Facades\Gate;

class InterviewParticipantStoreRequest extends BaseInterviewParticipantRequest
{
    public Interview $interview;

    public function rules(): array
    {
        return [
            ...parent::rules(),
            ...[
                /**
                 * Id of Interview
                 * @example 1
                 */
                "interview_id" => ["required", "integer:strict"],
            ],
        ];
    }

    public function authorize(): bool
    {
        Gate::authorize("create", [InterviewParticipant::class, $this->interview]);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->interview = Interview::findOrFail($this->input("interview_id"));
    }
}
