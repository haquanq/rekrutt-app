<?php

namespace App\Modules\Recruitment\Requests;

use App\Modules\Recruitment\Abstracts\BaseRecruitmentApplicationRequest;
use App\Modules\Recruitment\Enums\RecruitmentApplicationStatus;
use App\Modules\Recruitment\Models\RecruitmentApplication;
use App\Modules\Recruitment\Rules\RecruitmentApplicationStatusTransitionsFromRule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RecruitmentApplicationUpdateInterviewStatusRequest extends BaseRecruitmentApplicationRequest
{
    public RecruitmentApplication $recruitmentApplication;

    public function rules(): array
    {
        return [
            /**
             * Status
             * @example INTERVIEW_PENDING
             */
            "status" => [
                "required",
                Rule::enum(RecruitmentApplicationStatus::class)->only([
                    RecruitmentApplicationStatus::INTERVIEW_PENDING,
                    RecruitmentApplicationStatus::INTERVIEW_COMPLETED,
                ]),
                new RecruitmentApplicationStatusTransitionsFromRule($this->recruitmentApplication->status),
            ],
        ];
    }

    public function authorize(): bool
    {
        Gate::authorize("updateInterviewStatus", RecruitmentApplication::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->recruitmentApplication = RecruitmentApplication::findOrFail($this->route("id"));
    }
}
