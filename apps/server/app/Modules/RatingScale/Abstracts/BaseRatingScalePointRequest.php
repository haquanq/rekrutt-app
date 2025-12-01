<?php

namespace App\Modules\RatingScale\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseRatingScalePointRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /**
             * Rank/order
             * @example 1
             */
            "rank" => ["required", "integer"],
            /**
             * Label
             * @example 9 - Pretty good
             */
            "label" => ["required", "string", "max:100"],
            /**
             * Description
             * @example Candidate scored 9 out of 10
             */
            "definition" => ["required", "string", "max:300"],
            /**
             * Rating scale Id of which this rating scale point belongs
             * @example 1
             */
            "rating_scale_id" => ["required", "integer", "exists:rating_scale,id"],
        ];
    }
}
