<?php

namespace App\Modules\Candidate\Enums;

enum CandidateStatus: string
{
    case PENDING = "PENDING";
    case PROCESSING = "PROCESSING";
    case HIRED = "HIRED";
    case ARCHIVED = "ARCHIVED";
    case BLACKLISTED = "BLACKLISTED";
}
