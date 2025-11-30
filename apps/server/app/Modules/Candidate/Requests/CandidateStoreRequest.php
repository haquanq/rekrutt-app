<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateRequest;

class CandidateStoreRequest extends BaseCandidateRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
