<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateExperienceRequest;
use App\Modules\Candidate\Models\CandidateExperience;
use Illuminate\Support\Facades\Gate;

class CandidateExperienceDestroyRequest extends BaseCandidateExperienceRequest
{
    public CandidateExperience $candidateExperience;

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", CandidateExperience::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();
        $this->candidateExperience = CandidateExperience::with("candidate")->findOrFail($this->route("id"));
    }
}
