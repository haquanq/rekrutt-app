<?php

namespace App\Modules\Auth\Requests;

use App\Modules\Auth\Abstracts\BaseUserRequest;
use App\Modules\Auth\Enums\UserStatus;
use Carbon\Carbon;

class UpdateUserStatusRequest extends BaseUserRequest
{
    public function rules(): array
    {
        $status = UserStatus::tryFrom($this->input("status"));

        $baseRules = ["status" => parent::rules()["status"]];

        if (!$status) {
            return $baseRules;
        }

        $conditionalRules = match ($status) {
            UserStatus::SUSPENDED => [
                "suspension_ended_at" => ["required", "date", "after:today"],
                "suspension_started_at" => ["required", "date"],
                "suspension_note" => ["required", "string", "max:500"],
            ],
            UserStatus::RETIRED => [
                "retired_at" => ["required", "date", "after:today"],
            ],
        };

        return array_merge($baseRules, $conditionalRules);
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $status = UserStatus::tryFrom($this->input("status"));

        if ($status === UserStatus::SUSPENDED) {
            $this->merge([
                "suspension_started_at" => Carbon::now(),
            ]);
        } elseif ($status === UserStatus::RETIRED) {
            $this->merge([
                "retired_at" => Carbon::now(),
            ]);
        }
    }
}
