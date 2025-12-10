<?php

namespace App\Modules\EducationLevel\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\EducationLevel\Models\EducationLevel;

abstract class BaseEducationLevelRequest extends BaseFormRequest
{
    protected ?EducationLevel $educationLevel = null;

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

    public function getEducationLevelOrFail(string $param = null): EducationLevel
    {
        if ($this->educationLevel === null) {
            $this->educationLevel = EducationLevel::findOrFail($this->route($param ?? "id"));
        }

        return $this->educationLevel;
    }
}
