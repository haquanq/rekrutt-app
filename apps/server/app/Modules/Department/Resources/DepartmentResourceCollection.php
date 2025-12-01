<?php

namespace App\Modules\Department\Resources;

use App\Abstracts\BaseResourceCollection;

class DepartmentResourceCollection extends BaseResourceCollection
{
    public $collects = DepartmentResource::class;
}
