<?php

namespace App\Modules\RatingScale\Rules;

use App\Modules\RatingScale\Models\RatingScale;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RatingScaleIsActiveRule implements ValidationRule
{
    public function validate(string $attribute, mixed $id, Closure $fail): void
    {
        $ratingScale = RatingScale::find($id);

        if (!$ratingScale) {
            $fail("Rating scale does not exist");
            return;
        }

        if (!$ratingScale->is_active) {
            $fail("Rating scale is not active");
            return;
        }
    }
}
