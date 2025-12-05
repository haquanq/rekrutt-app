<?php

namespace App\Modules\Recruitment\Rules;

use App\Modules\Recruitment\Enums\RecruitmentApplicationStatus;
use App\Modules\Recruitment\Models\RecruitmentApplication;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecruitmentApplicationExistsWithStatusRule implements ValidationRule
{
    public function __construct(
        protected RecruitmentApplicationStatus $requiredStatus,
        protected ?RecruitmentApplication $recruitmentApplication = null,
    ) {}

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        if (!$this->recruitmentApplication) {
            $this->recruitmentApplication = RecruitmentApplication::find($id);
        }

        if (!$this->recruitmentApplication) {
            $fail("Recruitment application does not exist");
            return;
        }

        if ($this->recruitmentApplication->status !== $this->requiredStatus) {
            $fail("Recruitment application must have status: " . $this->requiredStatus->value);
            return;
        }
    }
}
