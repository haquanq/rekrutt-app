<?php

namespace App\Modules\Proposal\Rules;

use App\Modules\Proposal\Enums\ProposalStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProposalStatusTransitionsFromRule implements ValidationRule
{
    public function __construct(protected ProposalStatus $oldStatus) {}

    public function validate(string $attribute, mixed $newStatus, Closure $fail): void
    {
        $newStatus = ProposalStatus::tryFrom($newStatus);

        if (!$newStatus) {
            $fail("The selected proposal status is invalid.");
            return;
        }

        $transitions = [
            ProposalStatus::DRAFT->value => [ProposalStatus::PENDING],
            ProposalStatus::PENDING->value => [ProposalStatus::APPROVED, ProposalStatus::REJECTED],
            ProposalStatus::APPROVED->value => [],
            ProposalStatus::REJECTED->value => [],
        ];

        if ($this->oldStatus === $newStatus) {
            return;
        }

        if (!\in_array($newStatus, $transitions[$this->oldStatus->value])) {
            $fail("Can't change proposal status from {$this->oldStatus->value} to {$newStatus->value}.");
            return;
        }
    }
}
