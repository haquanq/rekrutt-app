<?php

namespace App\Modules\Auth\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\Auth\Enums\UserRole;
use App\Modules\Auth\Enums\UserStatus;
use App\Rules\PhoneNumberRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum as EnumRule;
use Illuminate\Validation\Rules\Password as PasswordRule;

abstract class BaseUserRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = \intval($this->route("id"));

        return [
            /**
             * First name
             * @example John
             */
            "first_name" => ["required", "string", "max:100"],
            /**
             * Last name
             * @example Rockstar
             */
            "last_name" => ["required", "string", "max:100"],
            /**
             * Username
             * @example johnxrockstar01
             */
            "username" => ["required", "string", "max:40"],
            /**
             * Password (generated automatically)
             * @ignoreParam
             */
            "password" => ["required", PasswordRule::default()->max(30)],
            /**
             * Role
             */
            "role" => ["required", Rule::enum(UserRole::class)],
            /**
             * Email address
             * @example john.rockstar@gmail.com
             */
            "email" => ["required", "email", Rule::unique("user", "email")->ignore($id)],
            /**
             * Phone number
             * @example +123456789
             */
            "phone_number" => ["required", new PhoneNumberRule(), Rule::unique("user", "phone_number")->ignore($id)],
            /**
             * Id of Position of user
             * @example 1
             */
            "position_id" => ["required"],
        ];
    }
}
