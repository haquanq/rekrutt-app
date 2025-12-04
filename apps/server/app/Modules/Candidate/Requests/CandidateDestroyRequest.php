<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateRequest;
use App\Modules\Candidate\Models\Candidate;
use Illuminate\Support\Facades\Gate;

class CandidateDestroyRequest extends BaseCandidateRequest
{
    public Candidate $candidate;

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", Candidate::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->candidate = Candidate::findOrFail($this->route("id"));
    }
}
