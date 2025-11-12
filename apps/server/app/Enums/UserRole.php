<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = "ADMIN";
    case MANAGER = "MANAGER";
    case RECRUITER = "RECRUITER";
    case EXECUTIVE = "EXECUTIVE";
}
