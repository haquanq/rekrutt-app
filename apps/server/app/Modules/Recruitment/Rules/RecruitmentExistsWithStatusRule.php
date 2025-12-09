<?php

namespace App\Modules\Recruitment\Rules;

use App\Modules\Recruitment\Enums\RecruitmentStatus;
use App\Modules\Recruitment\Models\Recruitment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecruitmentExistsWithStatusRule implements ValidationRule
{
    private ?Recruitment $recruitment = null;
    private bool $withRecruitment = false;

    public function __construct(protected RecruitmentStatus $requiredStatus) {}

    public static function create(RecruitmentStatus $requiredStatus): self
    {
        return new self($requiredStatus);
    }

    public function withRecruitment(?Recruitment $recruitment): self
    {
        $this->recruitment = $recruitment;
        $this->withRecruitment = true;
        return $this;
    }

    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        if (!$this->recruitment && !$this->withRecruitment) {
            $this->recruitment = Recruitment::find($id);
        }

        if (!$this->recruitment) {
            $fail("Recruitment does not exist.");
            return;
        }

        if ($this->recruitment->status !== $this->requiredStatus) {
            $fail("Recruitment must have status of {$this->requiredStatus->value}.");
            return;
        }
    }
}
