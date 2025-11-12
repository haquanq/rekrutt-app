<?php

namespace App\Enums;

enum RecruitmentApplicationPriority: string
{
    case LOW = "LOW";
    case MEDIUM = "MEDIUM";
    case HIGH = "HIGH";
    case URGENT = "URGENT";
}
