<?php

namespace App\Modules\Candidate\Models;

use App\Abstracts\BaseModel;
use App\Modules\Auth\Models\User;
use App\Modules\Candidate\Enums\CandidateStatus;
use App\Modules\HiringSource\Models\HiringSource;
use App\Modules\Recruitment\Models\RecruitmentApplication;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends BaseModel
{
    protected $guarded = ["id", "created_at", "updated_at"];

    protected $casts = [
        "status" => CandidateStatus::class,
    ];

    public function hiringSource(): BelongsTo
    {
        return $this->belongsTo(HiringSource::class, "hiring_source_id", "id");
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(CandidateExperience::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(CandidateDocument::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(RecruitmentApplication::class);
    }

    public function blacklistedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "blacklisted_by_user_id");
    }

    public function reactivatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "reactivated_by_user_id");
    }
}
