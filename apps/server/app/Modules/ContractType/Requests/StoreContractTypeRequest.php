<?php

namespace App\Modules\ContractType\Requests;

use App\Modules\ContractType\Abstracts\BaseContractTypeRequest;

class StoreContractTypeRequest extends BaseContractTypeRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
