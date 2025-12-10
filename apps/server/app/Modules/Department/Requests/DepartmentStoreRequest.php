<?php

namespace App\Modules\Department\Requests;

use App\Modules\Department\Abstracts\BaseDepartmentRequest;
use App\Modules\Department\Models\Department;
use Illuminate\Support\Facades\Gate;

class DepartmentStoreRequest extends BaseDepartmentRequest
{
    public function authorize(): bool
    {
        Gate::authorize("create", Department::class);
        return true;
    }
}
