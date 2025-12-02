<?php

namespace App\Modules\Proposal\Resources;

use App\Abstracts\BaseResourceCollection;

class ProposalResourceCollection extends BaseResourceCollection
{
    public $collects = ProposalResource::class;
}
