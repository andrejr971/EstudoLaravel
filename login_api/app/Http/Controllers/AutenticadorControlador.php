<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticadorControlador extends Controller
{
    public function registro(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique',
            'password' => 'reuired|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return response()->json([
            'res' => 'Usuario criado com Sucesso',
        ], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'reuired|string'
        ]);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(!Auth::attempt([$credenciais])) {
            return response()->json([
                'res' => 'Acesso Negado',
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('Token de acesso')->accessToken;

        return response()->json([
            'token' => $token,
        ], 200);

    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->jason([
            'res' => 'Deslogado com sucesso'
        ]);
    }
}
