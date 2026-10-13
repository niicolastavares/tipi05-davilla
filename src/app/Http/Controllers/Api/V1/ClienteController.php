<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $cliente = $request->user();

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $cliente->id_cliente,
                'nome' => $cliente->nome_cliente,
                'tipo' => $cliente->tipo_cliente,
                'cpf_cnpj' => $cliente->cpf_cnpj_cliente,
                'data_nascimento' => $cliente->data_nasc_cliente,
                'email' => $cliente->email_cliente,
                'telefone' => $cliente->telefone_cliente,
                'foto' => $cliente->foto_cliente,
                'status' => $cliente->status_cliente,
            ],
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $cliente = $request->user();

        $dados = $request->validate([
            'nome' => ['sometimes', 'required', 'string', 'max:50'],
            'cpf_cnpj' => [
                'sometimes',
                'required',
                'string',
                'max:18',
                \Illuminate\Validation\Rule::unique('tbl_clientes', 'cpf_cnpj_cliente')
                    ->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'data_nascimento' => ['sometimes', 'required', 'date_format:Y-m-d'],
            'email' => [
                'sometimes',
                'required',
                'email',
                'max:80',
                \Illuminate\Validation\Rule::unique('tbl_clientes', 'email_cliente')
                    ->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'telefone' => ['sometimes', 'required', 'string', 'max:14'],
            'foto' => ['sometimes', 'required', 'string', 'max:60'],
        ]);

        $mapeamento = [
            'nome' => 'nome_cliente',
            'cpf_cnpj' => 'cpf_cnpj_cliente',
            'data_nascimento' => 'data_nasc_cliente',
            'email' => 'email_cliente',
            'telefone' => 'telefone_cliente',
            'foto' => 'foto_cliente',
        ];

        foreach ($mapeamento as $campoApi => $campoBanco) {
            if (array_key_exists($campoApi, $dados)) {
                $cliente->{$campoBanco} = $dados[$campoApi];
            }
        }

        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'Perfil atualizado com sucesso.',
            'data' => [
                'id' => $cliente->id_cliente,
                'nome' => $cliente->nome_cliente,
                'tipo' => $cliente->tipo_cliente,
                'cpf_cnpj' => $cliente->cpf_cnpj_cliente,
                'data_nascimento' => $cliente->data_nasc_cliente,
                'email' => $cliente->email_cliente,
                'telefone' => $cliente->telefone_cliente,
                'foto' => $cliente->foto_cliente,
                'status' => $cliente->status_cliente,
            ],
        ]);
    }


    public function updatePassword(Request $request): JsonResponse
    {
        $dados = $request->validate([
            'senha_atual' => ['required', 'string'],
            'nova_senha' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $cliente = $request->user();

        if (!Hash::check($dados['senha_atual'], $cliente->senha_cliente)) {
            return response()->json([
                'success' => false,
                'message' => 'A senha atual está incorreta.',
            ], 422);
        }

        $cliente->senha_cliente = Hash::make($dados['nova_senha']);
        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'Senha alterada com sucesso.',
        ]);
    }

}
