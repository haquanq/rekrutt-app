<?php

namespace App\Modules\Interview\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\RatingScale\Rules\RatingScalePointBelongsToScaleRule;

abstract class BaseInterviewEvaluationRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            /**
             * Comment
             * @example Good attitude
             */
            "comment" => ["required", "string", "max:500"],
        ];
    }
}
