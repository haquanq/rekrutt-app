<?php

namespace App\Modules\Recruitment\Requests;

use App\Modules\Proposal\Rules\RecruitmentStatusTransitionsFromRule;
use App\Modules\Recruitment\Abstracts\BaseRecruitmentRequest;
use App\Modules\Recruitment\Enums\RecruitmentStatus;
use App\Modules\Recruitment\Models\Recruitment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RecruitmentDestroyRequest extends BaseRecruitmentRequest
{
    public Recruitment $recruitment;

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", $this->recruitment);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->recruitment = Recruitment::findOrFail($this->route("id"));
    }
}
