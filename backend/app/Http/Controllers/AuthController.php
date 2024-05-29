<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $credentials  = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $token = $user->createToken(env('APP_SECRET_KEY'))->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'course' => 'required',
            'role' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'email' => $credentials['email'],
            'firstname' => $credentials['firstname'],
            'lastname' => $credentials['lastname'],
            'middlename' => $credentials['middlename'],
            'course' => $credentials['course'],
            'role' => $credentials['role'],
            'birthday' => $credentials['birthday'],
            'phone' => $credentials['phone'],
            'address' => $credentials['address'],
            'password' => bcrypt($credentials['password'])
        ]);

        $token = $user->createToken(env('APP_SECRET_KEY'))->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function getAuth() {
        return Auth::user();
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return response(['message' => 'Logged out'], 200);
    }
}
