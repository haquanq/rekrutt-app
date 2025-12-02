<?php

namespace App\Modules\Proposal\Requests;

use App\Modules\Position\Rules\PositionExistsInCurrentUserDepartmentRule;
use App\Modules\Proposal\Abstracts\BaseProposalRequest;
use Illuminate\Support\Facades\Auth;

class ProposalStoreRequest extends BaseProposalRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            ...parent::rules(),
            ...[
                /**
                 * Id of Position in current User's department
                 * @example 1
                 */
                "position_id" => ["required", "integer", new PositionExistsInCurrentUserDepartmentRule()],
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();
        $this->merge([
            "created_by_user_id" => Auth::user()->id,
        ]);
    }
}
