<?php

namespace App\Modules\Position\Requests;

use App\Modules\Position\Abstracts\BasePositionRequest;
use App\Modules\Position\Models\Position;
use Illuminate\Support\Facades\Gate;

class PositionStoreRequest extends BasePositionRequest
{
    public function authorize(): bool
    {
        Gate::authorize("create", Position::class);
        return true;
    }
}
