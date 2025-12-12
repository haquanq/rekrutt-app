<?php

namespace App\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookieMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie("api_token");

        if ($token !== null) {
            $request->headers->set("Authorization", "Bearer $token");
        }

        return $next($request);
    }
}
