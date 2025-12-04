<?php

namespace App\Modules\Interview\Resources;

use App\Abstracts\BaseResourceCollection;
use App\Modules\Interview\Resources\InterviewMethodResource;

class InterviewMethodResourceCollection extends BaseResourceCollection
{
    public $collects = InterviewMethodResource::class;
}
