<?php

namespace App\Modules\Recruitment\Requests;

use App\Modules\Recruitment\Abstracts\BaseRecruitmentApplicationRequest;
use App\Modules\Recruitment\Enums\RecruitmentApplicationPriority;
use App\Modules\Recruitment\Models\RecruitmentApplication;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RecruitmentApplicationUpdatePriorityRequest extends BaseRecruitmentApplicationRequest
{
    public RecruitmentApplication $recruitmentApplication;

    public function rules(): array
    {
        return [
            "priority" => ["required", Rule::enum(RecruitmentApplicationPriority::class)],
        ];
    }

    public function authorize(): bool
    {
        Gate::authorize("updatePriority", RecruitmentApplication::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->recruitmentApplication = RecruitmentApplication::findOrFail($this->route("id"));
    }
}
