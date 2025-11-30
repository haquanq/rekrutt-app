<?php

namespace App\Modules\Auth\Requests;

use App\Modules\Auth\Abstracts\BaseUserRequest;

class UserStoreRequest extends BaseUserRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        unset($rules["status"]);
        return $rules;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();
        $this->mergeIfMissing([
            "password" => "12345678",
        ]);
    }
}
