<?php

namespace App\Modules\Recruitment\Rules;

use App\Modules\Recruitment\Enums\RecruitmentStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecruitmentStatusTransitionsFromRule implements ValidationRule
{
    public function __construct(protected RecruitmentStatus $oldStatus) {}

    public function validate(string $attribute, mixed $newStatus, Closure $fail): void
    {
        $newStatus = RecruitmentStatus::tryFrom($newStatus);

        if (!$newStatus) {
            $fail("The selected recruitment status is invalid.");
            return;
        }

        if ($this->oldStatus === $newStatus) {
            return;
        }

        $transitions = [
            RecruitmentStatus::DRAFT->value => [RecruitmentStatus::SCHEDULED],
            RecruitmentStatus::SCHEDULED->value => [RecruitmentStatus::PUBLISHED],
            RecruitmentStatus::PUBLISHED->value => [RecruitmentStatus::CLOSED],
            RecruitmentStatus::CLOSED->value => [RecruitmentStatus::COMPLETED],
            RecruitmentStatus::COMPLETED->value => [],
        ];

        if (!\in_array($newStatus, $transitions[$this->oldStatus->value])) {
            $fail("Can't change recruitment status from {$this->oldStatus->value} to {$newStatus->value}.");
        }
    }
}
