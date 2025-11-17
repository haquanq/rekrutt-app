<?php

namespace App\Abstracts;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController
{
    /* -------------------------------------------------------------------------- */
    /*                              SUCCESSFUL RESPONSE                           */
    /* -------------------------------------------------------------------------- */

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

    /* -------------------------------------------------------------------------- */
    /*                               CLIENT ERROR RESPONSE                        */
    /* -------------------------------------------------------------------------- */

    public function badRequestResponse(string $message = "Bad request."): JsonResponse
    {
        return response()->json(["message" => $message], Response::HTTP_BAD_REQUEST);
    }

    public function unauthorizedResponse(string $message = "Unauthorized."): JsonResponse
    {
        return response()->json(["message" => $message], Response::HTTP_UNAUTHORIZED);
    }

    public function forbiddenResponse(string $message = "Forbidden."): JsonResponse
    {
        return response()->json(["message" => $message], Response::HTTP_FORBIDDEN);
    }

    public function notFoundResponse(string $message = "Resource not found."): JsonResponse
    {
        return response()->json(["message" => $message], Response::HTTP_NOT_FOUND);
    }
}
