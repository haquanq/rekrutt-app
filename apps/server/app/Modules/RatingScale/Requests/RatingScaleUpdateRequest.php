<?php

namespace App\Modules\RatingScale\Requests;

use App\Modules\RatingScale\Abstracts\BaseRatingScaleRequest;

class RatingScaleUpdateRequest extends BaseRatingScaleRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
