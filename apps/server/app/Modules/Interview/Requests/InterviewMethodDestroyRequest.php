<?php

namespace App\Modules\Interview\Requests;

use App\Modules\Interview\Abstracts\BaseInterviewMethodRequest;
use App\Modules\Interview\Models\InterviewMethod;
use Illuminate\Support\Facades\Gate;

class InterviewMethodDestroyRequest extends BaseInterviewMethodRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", InterviewMethod::class);
        return true;
    }
}
