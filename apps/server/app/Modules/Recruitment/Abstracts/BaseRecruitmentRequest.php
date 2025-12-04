<?php

namespace App\Modules\Recruitment\Abstracts;

use App\Abstracts\BaseFormRequest;
use Illuminate\Support\Facades\Auth;

abstract class BaseRecruitmentRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            /**
             * Title
             * @example Tech Talent Wanted: Join Rekrutt as a Software Engineer and Shape the Future of Technology
             */
            "title" => ["required", "string", "max:100"],
            /**
             * Description
             * @example Rekrutt seeks talented Software Engineers to join our dynamic team and collaborate on innovative projects, leveraging cutting-edge technologies to deliver impactful solutions in various industries
             */
            "description" => ["string", "max:500"],
            /**
             * Position title
             * @example Senior Software Engineer
             */
            "position_title" => ["required", "string", "max:100"],
            /**
             * Scheduled start timestamp
             * @example 2025-08-10
             */
            "scheduled_start_at" => ["required", "date", "after:now"],
            /**
             * Scheduled end timestamp
             * @example 2025-11-10
             */
            "scheduled_end_at" => ["required", "date", "after:scheduled_start_at"],
        ];
    }
}
