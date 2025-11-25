<?php

namespace App\Modules\Position\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BasePositionRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:100"],
            "description" => ["string", "max:500"],
            "department_id" => ["required", "integer", "exists:department,id"],
        ];
    }
}
