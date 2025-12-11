<?php

namespace App\Modules\RatingScale\Requests;

use App\Modules\RatingScale\Abstracts\BaseRatingScalePointRequest;
use App\Modules\RatingScale\Models\RatingScalePoint;
use Illuminate\Support\Facades\Gate;

class RatingScalePointUpdateRequest extends BaseRatingScalePointRequest
{
    public function authorize(): bool
    {
        Gate::authorize("update", RatingScalePoint::class);
        return true;
    }
}
