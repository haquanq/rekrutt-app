<?php

namespace App\Modules\Interview\Resources;

use App\Abstracts\BaseResourceCollection;

class InterviewResourceCollection extends BaseResourceCollection
{
    public $collects = InterviewResource::class;
}
