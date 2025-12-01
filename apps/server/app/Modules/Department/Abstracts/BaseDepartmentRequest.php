<?php

namespace App\Modules\Department\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseDepartmentRequest extends BaseFormRequest
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
             * @example "Research and Development"
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example "Research something"
             */
            "description" => ["string", "max:500"],
        ];
    }
}
