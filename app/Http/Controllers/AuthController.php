<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método de login
    public function login(Request $request)
    {
        // Validación de la solicitud
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar al usuario en la base de datos
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($request->password, $user->password)) {
            // Crear el token de acceso
            $token = $user->createToken('YourAppName')->plainTextToken;

            // Devolver el token en la respuesta
            return response()->json(['token' => $token], 200);
        }

        // Si el usuario no existe o las credenciales no son correctas
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Método de logout
    public function logout(Request $request)
    {
        // Revocar el token del usuario actual
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        // Responder con mensaje de éxito
        return response()->json(['message' => 'Logged out successfully']);
    }
}
