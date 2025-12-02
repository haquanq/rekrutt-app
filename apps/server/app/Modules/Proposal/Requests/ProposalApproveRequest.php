<?php

namespace App\Modules\Proposal\Requests;

use App\Modules\Proposal\Abstracts\BaseProposalRequest;
use App\Modules\Proposal\Enums\ProposalStatus;
use App\Modules\Proposal\Models\Proposal;
use App\Modules\Proposal\Rules\ProposalStatusTransitionsFromRule;
use Illuminate\Support\Facades\Gate;

class ProposalApproveRequest extends BaseProposalRequest
{
    public Proposal $proposal;

    public function authorize(): bool
    {
        Gate::authorize("approve", $this->proposal);
        return true;
    }

    public function rules(): array
    {
        return [
            /**
             * Status === REJECTED
             * @ignoreParam
             */
            "status" => ["required", new ProposalStatusTransitionsFromRule($this->proposal->status)],
        ];
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->proposal = Proposal::findOrFail($this->route("id"));

        $this->merge([
            "status" => ProposalStatus::APPROVED->value,
        ]);
    }
}
