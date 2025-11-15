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

    public function getAttribute($key)
    {
        $snake = Str::snake($key);
        return parent::getAttribute($snake);
    }

    public function setAttribute($key, $value)
    {
        $snake = Str::snake($key);
        return parent::setAttribute($snake, $value);
    }

    public function toArray()
    {
        $array = parent::toArray();

        // convert keys back to camelCase for output
        return collect($array)->mapWithKeys(fn($v, $k) => [Str::camel($k) => $v])->all();
    }
}
