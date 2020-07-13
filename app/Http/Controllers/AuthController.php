<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $user->createToken('rental')->accessToken,
            ]
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            $user = Auth::user(); 
   
            return (new UserResource($user))->additional([
                'meta' => [
                    'token' => $user->createToken('rental')->accessToken,
                ]
            ]);
        } 
        else { 
            return response()->json([
                'message' => 'login failed',
            ],401);
        } 
    }
}
