<?php

namespace App\Modules\ExperienceLevel\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\ExperienceLevel\Models\ExperienceLevel;

abstract class BaseExperienceLevelRequest extends BaseFormRequest
{
    protected ?ExperienceLevel $experienceLevel = null;

    public function getQueriedExperienceLevelOrFail(string $param = "id"): ExperienceLevel
    {
        if ($this->experienceLevel === null) {
            $this->experienceLevel = ExperienceLevel::findOrFail($this->route($param));
        }

        return $this->experienceLevel;
    }

    public function rules(): array
    {
        return [
            /**
             * Name
             * @example Freelance
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example Working as a freelancer
             */
            "description" => ["nullable", "string", "max:500"],
        ];
    }
}
