<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
            'device_name' => ['nullable', 'string', 'max:255'],
        ]);

        $cliente = Cliente::where('email_cliente', $dados['email'])->first();

        if (
            !$cliente ||
            !Hash::check($dados['senha'], $cliente->senha_cliente)
        ) {
            return response()->json([
                'success' => false,
                'message' => 'E-mail ou senha inválidos.',
            ], 401);
        }

        if (strtoupper($cliente->status_cliente) !== 'ATIVO') {
            return response()->json([
                'success' => false,
                'message' => 'Cliente inativo.',
            ], 403);
        }

        $token = $cliente->createToken(
            $dados['device_name'] ?? 'api'
        )->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login realizado com sucesso.',
            'data' => [
                'cliente' => [
                    'id' => $cliente->id_cliente,
                    'nome' => $cliente->nome_cliente,
                    'email' => $cliente->email_cliente,
                ],
                'token' => $token,
                'token_type' => 'Bearer',
            ],
        ]);
    }
    public function logout(Request $request): JsonResponse
    {
        $token = $request->user()->currentAccessToken();
        $token->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout realizado com sucesso.',
        ]);
    }
}
