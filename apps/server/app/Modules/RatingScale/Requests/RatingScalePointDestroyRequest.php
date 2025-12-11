<?php

namespace App\Modules\RatingScale\Requests;

use App\Modules\RatingScale\Abstracts\BaseRatingScalePointRequest;
use App\Modules\RatingScale\Models\RatingScalePoint;
use Illuminate\Support\Facades\Gate;

class RatingScalePointDestroyRequest extends BaseRatingScalePointRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", RatingScalePoint::class);
        return true;
    }
}
