<?php

namespace App\Modules\Interview\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\Interview\Models\InterviewParticipant;

abstract class BaseInterviewParticipantRequest extends BaseFormRequest
{
    protected ?InterviewParticipant $interviewParticipant = null;

    public function getQueriedInterviewParticipantOrFail(string $param = "id"): InterviewParticipant
    {
        if ($this->interviewParticipant === null) {
            $this->interviewParticipant = InterviewParticipant::findOrFail($this->route($param));
        }

        return $this->interviewParticipant;
    }

    public function rules(): array
    {
        return [
            /**
             * Note (role of participant)
             * @example Focus on technical skills
             */
            "note" => ["nullable", "string", "max:300"],
        ];
    }
}
