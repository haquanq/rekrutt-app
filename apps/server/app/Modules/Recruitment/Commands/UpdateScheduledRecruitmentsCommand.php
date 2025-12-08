<?php

namespace App\Modules\Recruitment\Commands;

use App\Modules\Recruitment\Enums\RecruitmentStatus;
use App\Modules\Recruitment\Models\Recruitment;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UpdateScheduledRecruitmentsCommand extends Command
{
    protected $signature = "recruitment:update-scheduled";
    protected $description = "Update scheduled recruitments.";

    public function handle(): void
    {
        Recruitment::query()
            ->where("status", "=", RecruitmentStatus::SCHEDULED->value)
            ->where("scheduled_publish_at", "<=", Carbon::now())
            ->update(["status" => RecruitmentStatus::PUBLISHED->value, "actual_published_at" => Carbon::now()]);

        Recruitment::query()
            ->where("status", "=", RecruitmentStatus::PUBLISHED->value)
            ->where("scheduled_close_at", "<=", Carbon::now())
            ->update(["status" => RecruitmentStatus::CLOSED->value, "actual_closed_at" => Carbon::now()]);
    }
}
