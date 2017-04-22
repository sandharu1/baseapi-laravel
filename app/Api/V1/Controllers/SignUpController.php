<?php

namespace App\Api\V1\Controllers;

use Config;
use App\User;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $user = new User($request->all());
        if(!$user->save()) {
            throw new HttpException(500);
        }

        if(!Config::get('s1api.sign_up.release_token')) {
            return response()->json([
                'status' => true
            ], 201);
        }

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => true,
            'token' => $token
        ], 201);
    }
}
