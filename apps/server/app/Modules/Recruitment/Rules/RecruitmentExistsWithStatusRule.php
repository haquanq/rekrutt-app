<?php

namespace App\Modules\Recruitment\Rules;

use App\Modules\Recruitment\Enums\RecruitmentStatus;
use App\Modules\Recruitment\Models\Recruitment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecruitmentExistsWithStatusRule implements ValidationRule
{
    public function __construct(protected RecruitmentStatus $requiredStatus) {}

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        $recruitment = Recruitment::find($id, ["status"]);

        if ($recruitment === null) {
            $fail("Recruitment does not exist.");
        } elseif ($recruitment->status !== $this->requiredStatus) {
            $fail("Recruitment must have status of {$this->requiredStatus->value}.");
        }
    }
}
