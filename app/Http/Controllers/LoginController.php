<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('app')->plainTextToken;
            return response()->json([
                'acceso' => 'ok',
                'error' => '',
                'token' => $token,
                'idUsuario' => $user->id,
                'nombreUsuario' => $user->name,
            ], 200);
        }else{
            return response()->json([
                'acceso' => '',
                'token' => '',
                'error' => 'No existe usuario o contraseña',
                'idUsuario' => 0,
                'nombreUsuario' => '',
            ], 401);
        }
    }
}
