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
            /**
             * Name
             * @example LinkedIn
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example LinkedIn is a professional networking and career advancement platform
             */
            "description" => ["string", "max:500"],
            /**
             * Site URL
             * @example https://www.linkedin.com/
             */
            "site_url" => ["string"],
        ];
    }
}
