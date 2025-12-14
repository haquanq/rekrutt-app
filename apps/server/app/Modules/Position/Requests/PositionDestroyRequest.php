<?php

namespace App\Modules\Position\Requests;

use App\Modules\Position\Abstracts\BasePositionRequest;
use App\Modules\Position\Models\Position;
use Illuminate\Support\Facades\Gate;

class PositionDestroyRequest extends BasePositionRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        Gate::authorize("delete", Position::class);
        return true;
    }
}
