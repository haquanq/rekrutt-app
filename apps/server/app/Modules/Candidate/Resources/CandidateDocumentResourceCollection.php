<?php

namespace App\Modules\Candidate\Resources;

use App\Abstracts\BaseResourceCollection;

class CandidateDocumentResourceCollection extends BaseResourceCollection
{
    public $collects = CandidateDocumentResource::class;
}
