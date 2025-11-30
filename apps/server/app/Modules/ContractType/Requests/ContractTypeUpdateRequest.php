<?php

namespace App\Modules\ContractType\Requests;

use App\Modules\ContractType\Abstracts\BaseContractTypeRequest;

class ContractTypeUpdateRequest extends BaseContractTypeRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
