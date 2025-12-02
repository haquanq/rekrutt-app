<?php

namespace App\Modules\Proposal\Models;

use App\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProposalDocument extends BaseModel
{
    protected $guarded = ["id", "created_at", "updated_at"];
    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }
}
