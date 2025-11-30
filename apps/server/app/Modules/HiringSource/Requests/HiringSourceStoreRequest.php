<?php

namespace App\Modules\HiringSource\Requests;

use App\Modules\HiringSource\Abstracts\BaseHiringSourceRequest;

class HiringSourceStoreRequest extends BaseHiringSourceRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }
}
