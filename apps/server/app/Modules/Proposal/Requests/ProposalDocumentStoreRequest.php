<?php

namespace App\Modules\Proposal\Requests;

use App\Modules\Proposal\Abstracts\BaseProposalDocumentRequest;
use App\Modules\Proposal\Enums\ProposalStatus;
use App\Modules\Proposal\Models\Proposal;
use App\Modules\Proposal\Models\ProposalDocument;
use App\Modules\Proposal\Rules\ProposalExistsWithStatusRule;
use Illuminate\Support\Facades\Gate;

class ProposalDocumentStoreRequest extends BaseProposalDocumentRequest
{
    public $proposal;

    public function rules(): array
    {
        $rules = parent::rules();

        $rules["proposal_id"] = [
            "required",
            "integer",
            new ProposalExistsWithStatusRule(ProposalStatus::DRAFT, $this->proposal),
        ];

        return $rules;
    }

    public function authorize(): bool
    {
        Gate::authorize("create", [ProposalDocument::class, $this->proposal]);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();
        $this->proposal = Proposal::findOrFail($this->input("proposal_id"));
    }
}
