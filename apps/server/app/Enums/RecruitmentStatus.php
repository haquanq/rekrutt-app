<?php

namespace App\Enums;

enum RecruitmentStatus: string
{
    case DRAFT = "DRAFT";
    case PUBLISHED = "PUBLISHED";
    case CLOSED = "CLOSED";
    case COMPLETED = "COMPLETED";
}
