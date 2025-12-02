<?php

namespace App\Modules\Proposal\Rules;

use App\Modules\Proposal\Enums\ProposalStatus;
use App\Modules\Proposal\Models\Proposal;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class ProposalExistsWithStatusRule implements ValidationRule
{
    public function __construct(protected ProposalStatus $requiredStatus, protected ?Proposal $proposal = null) {}

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        if (!$this->proposal) {
            $this->proposal = Proposal::find($id);
        }

        if (!$this->proposal) {
            $fail("Proposal does not exist");
            return;
        }

        if ($this->proposal->status !== $this->requiredStatus) {
            $fail("Proposal must have status: " . $this->requiredStatus->value);
            return;
        }
    }
}
