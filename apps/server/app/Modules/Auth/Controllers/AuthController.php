<?php

namespace App\Modules\Auth\Controllers;

use App\Abstracts\BaseController;
use App\Modules\Auth\Requests\ChangePasswordRequest;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;

class AuthController extends BaseController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!($token = Auth::attempt($credentials))) {
            return $this->unauthorizedResponse("Invalid credentials.");
        }

        $cookie = cookie("jwt_token", $token, config("jwt.ttl"), sameSite: "none");
        return $this->okResponse([new UserResource(Auth::user())])->withCookie($cookie);
    }

    public function logout()
    {
        Auth::logout();
        return $this->noContentResponse();
    }

    public function refresh()
    {
        $cookie = cookie("jwt_token", Auth::refresh(), config("jwt.ttl"), sameSite: "none");
        return $this->okResponse([new UserResource(Auth::user())])->withCookie($cookie);
    }

    public function me()
    {
        return $this->okResponse(new UserResource(Auth::user()));
    }
}
