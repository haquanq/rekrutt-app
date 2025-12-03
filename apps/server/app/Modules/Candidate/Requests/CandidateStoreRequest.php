<?php

namespace App\Modules\Candidate\Requests;

use App\Modules\Candidate\Abstracts\BaseCandidateRequest;
use App\Modules\Candidate\Models\Candidate;
use Illuminate\Support\Facades\Gate;

class CandidateStoreRequest extends BaseCandidateRequest
{
    public function authorize(): bool
    {
        Gate::authorize("create", Candidate::class);
        return true;
    }
}
