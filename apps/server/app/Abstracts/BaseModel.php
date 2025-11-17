<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    public function getTable()
    {
        return $this->table ?? Str::singular(Str::snake(class_basename($this)));
    }
}
