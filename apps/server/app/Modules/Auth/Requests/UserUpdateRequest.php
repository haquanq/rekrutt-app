<?php

namespace App\Modules\Auth\Requests;

use App\Modules\Auth\Abstracts\BaseUserRequest;
use App\Modules\Auth\Models\User;
use Illuminate\Support\Facades\Gate;

class UserUpdateRequest extends BaseUserRequest
{
    public User $user;

    public function authorize(): bool
    {
        Gate::authorize("update", User::class);
        return true;
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->user = User::findOrFail($this->route("id"));
    }
}
