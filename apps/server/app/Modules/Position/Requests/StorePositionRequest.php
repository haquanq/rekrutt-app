<?php

namespace App\Modules\Position\Requests;

use App\Modules\Position\Abstracts\BasePositionRequest;

class StorePositionRequest extends BasePositionRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
