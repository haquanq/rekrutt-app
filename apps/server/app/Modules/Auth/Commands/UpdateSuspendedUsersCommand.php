<?php

namespace App\Modules\Auth\Commands;

use App\Modules\Auth\Enums\UserStatus;
use App\Modules\Auth\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UpdateSuspendedUsersCommand extends Command
{
    protected $signature = "user:update-suspended";
    protected $description = "Update suspended users.";

    public function handle(): void
    {
        User::query()
            ->where("status", "=", UserStatus::SUSPENDED->value)
            ->where("suspension_ended_at", "<=", Carbon::now())
            ->update(["status" => UserStatus::ACTIVE->value]);
    }
}
