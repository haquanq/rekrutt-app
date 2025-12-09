<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewEvaluationRequest;
use App\Modules\Interview\Models\InterviewEvaluation;
use Illuminate\Support\Facades\Gate;

class InterviewEvaluationDestroyRequest extends BaseInterviewEvaluationRequest
{
    public InterviewEvaluation $interviewEvaluation;

    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", $this->interviewEvaluation);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->interviewEvaluation = InterviewEvaluation::with("inteview")->findOrFail($this->input("id"));
    }
}
