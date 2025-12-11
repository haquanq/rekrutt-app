<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateDocumentRequest;
use App\Modules\Candidate\Models\CandidateDocument;
use Illuminate\Support\Facades\Gate;

class CandidateDocumentUpdateRequest extends BaseCandidateDocumentRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        unset($rules["document"]);
        return $rules;
    }

    public function authorize(): bool
    {
        Gate::authorize("update", CandidateDocument::class);
        return true;
    }
}
