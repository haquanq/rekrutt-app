<?php

namespace App\Modules\EducationLevel\Requests;

use App\Modules\EducationLevel\Abstracts\BaseEducationLevelRequest;

class EducationLevelUpdateRequest extends BaseEducationLevelRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
