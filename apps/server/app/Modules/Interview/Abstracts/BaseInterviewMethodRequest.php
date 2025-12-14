<?php

namespace App\Modules\Interview\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\Interview\Models\InterviewMethod;

abstract class BaseInterviewMethodRequest extends BaseFormRequest
{
    protected ?InterviewMethod $interviewMethod = null;

    public function getQueriedInterviewMethodOrFail(string $param = "id"): InterviewMethod
    {
        if ($this->interviewMethod === null) {
            $this->interviewMethod = InterviewMethod::findOrFail($this->route($param));
        }

        return $this->interviewMethod;
    }

    public function rules(): array
    {
        return [
            /**
             * Name
             * @example Screening Interview (Phone/Video)
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example A brief initial interview, typically conducted by an HR recruiter over the phone or video, to quickly assess basic qualifications, salary expectations, and overall fit before moving to more in-depth rounds.
             */
            "description" => ["string", "max:500"],
        ];
    }
}
