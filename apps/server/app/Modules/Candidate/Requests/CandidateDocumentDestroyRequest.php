<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateDocumentRequest;
use App\Modules\Candidate\Models\CandidateDocument;
use Illuminate\Support\Facades\Gate;

class CandidateDocumentDestroyRequest extends BaseCandidateDocumentRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", CandidateDocument::class);
        return true;
    }
}
