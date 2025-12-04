<?php

namespace App\Modules\Interview\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseInterviewMethodRequest extends BaseFormRequest
{
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
