<?php

namespace App\Modules\Candidate\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Rules\PhoneNumberRule;
use Illuminate\Validation\Rule;

abstract class BaseCandidateRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $id = \intval($this->route("id"));

        return [
            /**
             * First name
             * @example Lamar
             */
            "first_name" => ["required", "string", "max:100"],
            /**
             * Last name
             * @example Alexander
             */
            "last_name" => ["required", "string", "max:100"],
            /**
             * Date of birth
             * @example 1999-01-01
             */
            "date_of_birth" => ["required", "date", "before:today"],
            /**
             * Address
             * @example 123 Main St
             */
            "address" => ["required", "string", "max:500"],
            /**
             * Email address
             * @example lamar.xander2@outlook.com
             */
            "email" => ["required", "email", Rule::unique("candidate", "email")->ignore($id)],
            /**
             * Phone number
             * @example 123-456-7890
             */
            "phone_number" => [
                "required",
                new PhoneNumberRule(),
                Rule::unique("candidate", "phone_number")->ignore($id),
            ],
            /**
             * Id of HiringSource where candidate originated
             * @example 123-456-7890
             */
            "hiring_source_id" => ["required", "integer:strict", "exists:hiring_source,id"],
        ];
    }
}
