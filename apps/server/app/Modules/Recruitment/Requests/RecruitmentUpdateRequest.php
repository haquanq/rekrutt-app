<?php

namespace App\Modules\Recruitment\Requests;

use App\Modules\Recruitment\Abstracts\BaseRecruitmentRequest;
use App\Modules\Recruitment\Models\Recruitment;
use Illuminate\Support\Facades\Gate;

class RecruitmentUpdateRequest extends BaseRecruitmentRequest
{
    public Recruitment $recruitment;

    public function authorize(): bool
    {
        Gate::authorize("update", $this->recruitment);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->recruitment = Recruitment::findOrFail($this->route("id"));
    }
}
