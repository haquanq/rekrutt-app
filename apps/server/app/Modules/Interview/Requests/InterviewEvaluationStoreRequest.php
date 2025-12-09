<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewEvaluationRequest;
use App\Modules\Interview\Models\Interview;
use App\Modules\Interview\Models\InterviewEvaluation;
use App\Modules\RatingScale\Rules\RatingScalePointBelongsToScaleRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InterviewEvaluationStoreRequest extends BaseInterviewEvaluationRequest
{
    public Interview $interview;

    public function rules(): array
    {
        return [
            ...parent::rules(),
            ...[
                /**
                 * Created by current User
                 * @ignoreParam
                 */
                "created_by_user_id" => ["required", "integer:strict"],
                /**
                 * Id of Interview
                 * @example 1
                 */
                "interview_id" => ["required", "integer:strict"],
                /**
                 * Id of RatingScalePoint (belongs to RatingScale selected for this Interview)
                 * @example 1
                 */
                "rating_scale_point_id" => [
                    "required",
                    "integer:strict",
                    new RatingScalePointBelongsToScaleRule($this->interview->ratingScale),
                ],
            ],
        ];
    }

    public function authorize(): bool
    {
        Gate::authorize("create", [InterviewEvaluation::class, $this->interview]);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->interview = Interview::with("ratingScale")->findOrFail($this->input("interview_id"));

        $this->merge([
            "created_by_user_id" => Auth::user()->id,
        ]);
    }
}
