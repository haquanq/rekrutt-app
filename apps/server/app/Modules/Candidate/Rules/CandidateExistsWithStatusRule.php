<?php

namespace App\Modules\Candidate\Rules;

use App\Modules\Candidate\Enums\CandidateStatus;
use App\Modules\Candidate\Models\Candidate;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CandidateExistsWithStatusRule implements ValidationRule
{
    public function __construct(protected CandidateStatus $requiredStatus) {}

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        $candidate = Candidate::find($id, ["status"]);

        if ($candidate === null) {
            $fail("Candidate does not exist.");
        } elseif ($candidate->status !== $this->requiredStatus) {
            $fail("Candidate must have status of {$this->requiredStatus->value}.");
        }
    }
}
