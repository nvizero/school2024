<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegRep;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        // 成功则返回令牌
        return response()->json(compact('token'));
    }

    public function register(RegRep $request)
    {

        $insert = [
            'name' => $request->name,
            'level' => 1,
            'userid' => $request->userid,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($insert);

        return response()->json(compact('user'), 201);
    }
}
