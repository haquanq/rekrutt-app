<?php

namespace App\Modules\Proposal\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProposalDocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "file_url" => route("proposal-documents.download", $this->id),
            "file_name" => $this->file_name,
            "file_exension" => $this->file_extension,
            "mime_type" => $this->mime_type,
            "notes" => $this->notes,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "proposal" => ProposalResource::make($this->whenLoaded("proposal")),
        ];
    }
}
