<?php

namespace App\Modules\HiringSource\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseHiringSourceRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:100"],
            "description" => ["string", "max:500"],
            "site_url" => ["string"],
        ];
    }
}
