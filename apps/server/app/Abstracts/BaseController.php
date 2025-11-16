<?php

namespace App\Abstracts;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController
{
    public function notFoundResponse(string $message = "Resource not found."): JsonResponse
    {
        return response()->json(["message" => $message], Response::HTTP_NOT_FOUND);
    }

    public function okResponse(array|object $data): JsonResponse
    {
        return response()->json($data, Response::HTTP_OK);
    }

    public function createdResponse(array|object $data): JsonResponse
    {
        return response()->json($data, Response::HTTP_CREATED);
    }

    public function noContentResponse(): JsonResponse
    {
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
