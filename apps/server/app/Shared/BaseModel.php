<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        // If $this->table is explicitly set, use it. Otherwise, singularize the class name.
        return $this->table ?? Str::singular(Str::snake(class_basename($this)));
    }
}
