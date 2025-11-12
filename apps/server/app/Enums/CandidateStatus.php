<?php

namespace App\Enums;

enum CandidateStatus: string
{
    case NEW = "NEW";
    case PROCESSING = "PROCESSING";
    case HIRED = "HIRED";
    case ARCHIVED = "ARCHIVED";
    case BLACKLISTED = "BLACKLISTED";
}
