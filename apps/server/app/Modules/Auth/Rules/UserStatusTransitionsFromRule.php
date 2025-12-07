<?php

namespace App\Modules\Auth\Rules;

use App\Modules\Auth\Enums\UserStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UserStatusTransitionsFromRule implements ValidationRule
{
    public function __construct(protected UserStatus $oldStatus) {}

    public function validate(string $attribute, mixed $newStatus, Closure $fail): void
    {
        $newStatus = UserStatus::tryFrom($newStatus);

        if (!$newStatus) {
            $fail("The selected user status is invalid.");
            return;
        }

        $transitions = [
            UserStatus::ACTIVE->value => [UserStatus::SUSPENDED, UserStatus::RETIRED],
            UserStatus::SUSPENDED->value => [UserStatus::ACTIVE],
            UserStatus::RETIRED->value => [UserStatus::ACTIVE],
        ];

        if ($this->oldStatus === $newStatus) {
            return;
        }

        if (!\in_array($newStatus, $transitions[$this->oldStatus->value])) {
            $fail("Can't change user status from {$this->oldStatus->value} to {$newStatus->value}.");
            return;
        }
    }
}
