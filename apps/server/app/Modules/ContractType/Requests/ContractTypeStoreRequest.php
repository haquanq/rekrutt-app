<?php

namespace App\Modules\ContractType\Requests;

use App\Modules\ContractType\Abstracts\BaseContractTypeRequest;

class ContractTypeStoreRequest extends BaseContractTypeRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
