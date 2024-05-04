<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['token' => Auth::user()->createToken('authToken')->plainTextToken]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        } catch (\Throwable $th) {dd($th);
            //throw $th;
        }
        
    }
}
