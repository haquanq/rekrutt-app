<?php

namespace App\Modules\EducationLevel\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationLevelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
