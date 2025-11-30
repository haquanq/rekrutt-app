<?php

namespace App\Modules\Position\Requests;

use App\Modules\Position\Abstracts\BasePositionRequest;

class PositionUpdateRequest extends BasePositionRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
