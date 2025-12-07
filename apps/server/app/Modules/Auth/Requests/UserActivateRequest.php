<?php

namespace App\Modules\Auth\Requests;

use App\Modules\Auth\Abstracts\BaseUserRequest;
use App\Modules\Auth\Enums\UserStatus;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Rules\UserStatusTransitionsFromRule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserActivateRequest extends BaseUserRequest
{
    public User $user;

    public function rules(): array
    {
        return [
            /**
             * Status === ACTIVE
             * @ignoreParam
             */
            "status" => [
                "required",
                Rule::enum(UserStatus::class)->only(UserStatus::ACTIVE),
                new UserStatusTransitionsFromRule($this->user->status),
            ],
        ];
    }

    public function authorize(): bool
    {
        Gate::authorize("update", User::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->user = User::findOrFail($this->route("id"));

        $this->merge([
            "status" => UserStatus::ACTIVE->value,
        ]);
    }
}
