<?php

namespace App\Modules\Proposal\Resources;

use App\Abstracts\BaseResourceCollection;

class ProposalDocumentResourceCollection extends BaseResourceCollection
{
    public $collects = ProposalDocumentResource::class;
}
