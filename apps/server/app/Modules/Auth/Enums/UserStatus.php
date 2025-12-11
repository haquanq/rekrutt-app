<?php

namespace App\Modules\Auth\Enums;

enum UserStatus: string
{
    case ACTIVE = "ACTIVE";
    case SUSPENDED = "SUSPENDED";
    case RETIRED = "RETIRED";

    public function description(): string
    {
        return match ($this) {
            self::ACTIVE => "User is active.",
            self::SUSPENDED => "User is suspended.",
            self::RETIRED => "User is retired.",
        };
    }
}
