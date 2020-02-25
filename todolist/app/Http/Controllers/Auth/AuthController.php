<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;

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

    public function getTokenStatus()
    {
        $claims = auth()->payload();

        return response()->json([
            'message' => 'success',
            'data'    => [
                'issue_at'   => Carbon::parse($claims->get('iat')),
                'expired_at' => Carbon::parse($claims->get('exp')),
                'ttl'        => config('jwt.ttl') * 60
            ],
        ]);
    }
}
