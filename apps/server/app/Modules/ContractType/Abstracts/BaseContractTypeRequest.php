<?php

namespace App\Modules\ContractType\Abstracts;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseContractTypeRequest extends FormRequest
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
        ];
    }
}
