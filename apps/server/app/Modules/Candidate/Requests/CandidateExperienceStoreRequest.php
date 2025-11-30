<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateExperienceRequest;

class CandidateExperienceStoreRequest extends BaseCandidateExperienceRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
