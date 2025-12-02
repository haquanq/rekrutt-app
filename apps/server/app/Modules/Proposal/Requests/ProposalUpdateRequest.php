<?php

namespace App\Modules\Proposal\Requests;

use App\Modules\Proposal\Abstracts\BaseProposalRequest;

class ProposalUpdateRequest extends BaseProposalRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        unset($rules["created_by_user_id"]);
        return $rules;
    }
}
