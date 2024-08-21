<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ]);
    }

    public function loginUser(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'status' => false,
                'message' => "Email and Password don't match with our registres"
            ], 401);
        }
        else
        {
            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User login successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
    }
}
