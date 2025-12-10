<?php

namespace App\Modules\EducationLevel\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseEducationLevelRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            /**
             * Name
             * @example High School
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example Graduated high school (no further education)
             */
            "description" => ["nullable", "string", "max:500"],
        ];
    }
}
