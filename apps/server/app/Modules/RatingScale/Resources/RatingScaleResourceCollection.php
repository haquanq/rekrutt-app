<?php

namespace App\Modules\RatingScale\Resources;

use App\Abstracts\BaseResourceCollection;

class RatingScaleResourceCollection extends BaseResourceCollection
{
    public $collects = RatingScaleResource::class;
}
