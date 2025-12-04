<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateExperienceRequest;
use App\Modules\Candidate\Models\CandidateExperience;
use Illuminate\Support\Facades\Gate;

class CandidateExperienceStoreRequest extends BaseCandidateExperienceRequest
{
    public function authorize(): bool
    {
        Gate::authorize("create", CandidateExperience::class);
        return true;
    }
}
