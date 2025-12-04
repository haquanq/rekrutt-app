<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateRequest;
use App\Modules\Candidate\Models\Candidate;
use Illuminate\Support\Facades\Gate;

class CandidateUpdateRequest extends BaseCandidateRequest
{
    public Candidate $candidate;

    public function authorize(): bool
    {
        Gate::authorize("update", Candidate::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->candidate = Candidate::findOrFail($this->route("id"));
    }
}
