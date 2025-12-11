<?php

namespace App\Modules\Candidate\Enums;

enum CandidateStatus: string
{
    case READY = "READY";
    case APPLYING = "APPLYING";
    case EMPLOYED = "EMPLOYED";
    case ARCHIVED = "ARCHIVED";
    case BLACKLISTED = "BLACKLISTED";

    public function description(): string
    {
        return match ($this) {
            self::READY => "Candidate is ready.",
            self::APPLYING => "Candidate is applying.",
            self::EMPLOYED => "Candidate is employed.",
            self::ARCHIVED => "Candidate is archived.",
            self::BLACKLISTED => "Candidate is blacklisted.",
        };
    }
}
