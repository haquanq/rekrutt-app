<?php

namespace App\Enums;

enum ProposalStatus: string
{
    case DRAFT = "DRAFT";
    case PUBLISHED = "PENDING";
    case APPROVED = "APPROVED";
    case REJECTED = "REJECTED";
}
