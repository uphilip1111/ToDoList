<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function getAccessToken(): Response
    {
        $user = new User();
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'success',
            'data'    => ['access_token' => $token]
        ]);
    }
}
