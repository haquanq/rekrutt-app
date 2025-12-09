<?php

namespace App\Modules\Interview\Models;

use App\Abstracts\BaseModel;
use App\Modules\Auth\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InterviewParticipant extends BaseModel
{
    protected $guarded = ["id", "created_at", "updated_at"];

    protected $with = ["participant"];

    public function interview(): BelongsTo
    {
        return $this->belongsTo(Interview::class);
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
