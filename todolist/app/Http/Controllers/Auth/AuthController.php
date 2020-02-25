<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AuthController extends Controller
{
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

    public function refreshToken()
    {
        $token = auth()->refresh();

        return response()->json([
            'message' => 'success',
            'data'    => [
                'access_token' => $token,
            ]
        ]);
    }
}
