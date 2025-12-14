<?php

namespace App\Modules\Department\Abstracts;

use App\Abstracts\BaseFormRequest;
use App\Modules\Department\Models\Department;

abstract class BaseDepartmentRequest extends BaseFormRequest
{
    protected ?Department $department = null;

    public function getQueriedDepartmentOrFail(string $param = "id"): Department
    {
        if ($this->department === null) {
            $this->department = Department::findOrFail($this->route($param));
        }

        return $this->department;
    }

    public function rules(): array
    {
        return [
            /**
             * Name
             * @example "Research and Development"
             */
            "name" => ["required", "string", "max:100"],
            /**
             * Description
             * @example "Research something"
             */
            "description" => ["nullable", "string", "max:500"],
        ];
    }
}
