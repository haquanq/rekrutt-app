<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateDocumentRequest;

class CandidateDocumentStoreRequest extends BaseCandidateDocumentRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
