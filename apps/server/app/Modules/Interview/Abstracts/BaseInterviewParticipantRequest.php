<?php

namespace App\Modules\Interview\Abstracts;

use App\Abstracts\BaseFormRequest;

abstract class BaseInterviewParticipantRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            /**
             * Note (role of participant)
             * @example Focus on technical skills
             */
            "note" => ["nullable", "string", "max:300"],
        ];
    }
}
