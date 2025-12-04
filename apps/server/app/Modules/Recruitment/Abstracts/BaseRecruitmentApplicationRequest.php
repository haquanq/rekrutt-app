<?php

namespace App\Modules\Recruitment\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseRecruitmentApplicationRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [];
    }
}
