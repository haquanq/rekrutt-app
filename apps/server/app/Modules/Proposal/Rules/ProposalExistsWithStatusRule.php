<?php

namespace App\Modules\Proposal\Rules;

use App\Modules\Proposal\Enums\ProposalStatus;
use App\Modules\Proposal\Models\Proposal;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class ProposalExistsWithStatusRule implements ValidationRule
{
    public function __construct(protected ProposalStatus $requiredStatus) {}

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        $proposal = Proposal::find($id);

        if (!$proposal) {
            $fail("Proposal does not exist");
            return;
        }

        if ($proposal->status !== ProposalStatus::APPROVED->value) {
            $fail("Proposal is not " . Str::lower($this->requiredStatus->value));
            return;
        }
    }
}
