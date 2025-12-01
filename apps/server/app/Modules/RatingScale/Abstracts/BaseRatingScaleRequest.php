<?php

namespace App\Modules\RatingScale\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseRatingScaleRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /**
             * Name
             * @example 10-Point Numerical Scale
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example The 10-Point Numerical Scale is a rating scale that ranges from 0 to 10, with 0 being the lowest rating and 10 being the highest rating.
             */
            "description" => ["string", "max:500"],
            /**
             * Whether the rating scale is active
             * @example true
             */
            "is_active" => ["required", "boolean"],
        ];
    }
}
