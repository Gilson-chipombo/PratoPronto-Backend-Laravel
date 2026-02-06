<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $reques)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data[email])->first();
        if (!$user) return response()->status(404)->json(['message' => 'User not found']);
        
        if (!Hash::check($data[password], $user->password)) return response()->json(['message' => 'Invalid credentials']);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->status(200)->json([
            'toke' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currenAccessToken()->delete();

        return response()->status(200)->json(['message' => 'Logout success']);
    }
}
