<?php

namespace App\Modules\Recruitment\Commands;

use App\Modules\Recruitment\Enums\RecruitmentStatus;
use App\Modules\Recruitment\Models\Recruitment;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UpdateCompletedRecruitmentsCommand extends Command
{
    protected $signature = "recruitment:update-completed";
    protected $description = "Update completed recruitments.";

    public function handle(): void
    {
        $closedRecruitments = Recruitment::with("applications")
            ->where(["status" => RecruitmentStatus::CLOSED->value])
            ->get();

        $completedRecruitmentIds = $closedRecruitments
            ->filter(
                fn($recruitment) => $recruitment->applications->every(fn($application) => $application->isCompleted()),
            )
            ->pluck("id")
            ->toArray();

        Recruitment::query()
            ->whereIn("id", $completedRecruitmentIds)
            ->update([
                "status" => RecruitmentStatus::COMPLETED,
                "completed_at" => Carbon::now(),
            ]);
    }
}
