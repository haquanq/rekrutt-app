<?php

namespace App\Modules\Proposal\Requests;

use App\Modules\Proposal\Abstracts\BaseProposalRequest;
use App\Modules\Proposal\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProposalStoreRequest extends BaseProposalRequest
{
    public function authorize(): bool
    {
        Gate::authorize("create", Proposal::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();
        $this->merge([
            "created_by_user_id" => Auth::user()->id,
        ]);
    }
}
