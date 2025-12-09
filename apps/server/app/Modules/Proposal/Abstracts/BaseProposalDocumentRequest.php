<?php

namespace App\Modules\Proposal\Abstracts;

use App\Abstracts\BaseFormRequest;
use Illuminate\Validation\Rules\File as FileRule;

abstract class BaseProposalDocumentRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            /**
             * Document file (.pdf, .docx, .doc).
             * Max: 5MB
             */
            "document" => ["required", FileRule::types(["pdf", "docx", "doc"])->max(5 * 1024)],
            /**
             * Description
             * @example "Requirements"
             */
            "description" => ["string", "max:500"],
        ];
    }
}
