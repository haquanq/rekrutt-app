<?php

namespace App\Abstracts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseResourceCollection extends ResourceCollection
{
    public function paginationInformation(Request $request, array $paginated, array $default)
    {
        return [];
    }

    public function toArray($request)
    {
        return [
            "data" => $this->collection,
            "pagination" => [
                "total" => $this->total(),
                "page_size" => $this->perPage(),
                "page_number" => $this->currentPage(),
                "last_page" => $this->lastPage(),
            ],
        ];
    }
}
