<?php

namespace App\Modules\HiringSource\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HiringSourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "site_url" => $this->site_url,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
