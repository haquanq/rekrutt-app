<?php

namespace App\Enums;

enum InterviewStatus: string
{
    case DRAFT = "DRAFT";
    case PENDING = "PENDING";
    case COMPLETED = "COMPLETED";
    case CANCELLED = "CANCELLED";
}
