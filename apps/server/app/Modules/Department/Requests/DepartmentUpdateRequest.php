<?php

namespace App\Modules\Department\Requests;

use App\Modules\Department\Abstracts\BaseDepartmentRequest;
use App\Modules\Department\Models\Department;
use Illuminate\Support\Facades\Gate;

class DepartmentUpdateRequest extends BaseDepartmentRequest
{
    public function authorize(): bool
    {
        Gate::authorize("update", Department::class);
        return true;
    }
}
