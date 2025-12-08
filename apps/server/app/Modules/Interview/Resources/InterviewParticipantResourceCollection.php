<?php

namespace App\Modules\Interview\Resources;

use App\Abstracts\BaseResourceCollection;

class InterviewParticipantResourceCollection extends BaseResourceCollection
{
    public $collects = InterviewParticipantResource::class;
}
