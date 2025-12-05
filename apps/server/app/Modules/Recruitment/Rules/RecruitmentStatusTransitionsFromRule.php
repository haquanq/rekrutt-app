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

        $isDraft = $this->oldStatus === RecruitmentStatus::DRAFT;
        $isPublished = $this->oldStatus === RecruitmentStatus::PUBLISHED;
        $isClosed = $this->oldStatus === RecruitmentStatus::CLOSED;

        $changesToDraft = $newStatus === RecruitmentStatus::PUBLISHED;
        $changesToPublished = $newStatus === RecruitmentStatus::PUBLISHED;
        $changesToClosed = $newStatus === RecruitmentStatus::CLOSED;
        $changesToCompleted = $newStatus === RecruitmentStatus::COMPLETED;

        $message = "Can't change recruitment status from {$this->oldStatus->value} to {$newStatus->value}.";

        if ($changesToPublished && !$isDraft) {
            $requiredStatus = RecruitmentStatus::DRAFT->value;
            $fail("$message Required status: $requiredStatus");
            return;
        }

        if ($changesToClosed && !$isPublished) {
            $requiredStatus = RecruitmentStatus::PUBLISHED->value;
            $fail("$message Required status: $requiredStatus");
            return;
        }

        if ($changesToCompleted && !$isClosed) {
            $requiredStatus = RecruitmentStatus::CLOSED->value;
            $fail("$message Required status: $requiredStatus");
            return;
        }

        if ($changesToDraft) {
            $requiredStatus = RecruitmentStatus::PUBLISHED->value;
            $fail($message);
            return;
        }
    }
}
