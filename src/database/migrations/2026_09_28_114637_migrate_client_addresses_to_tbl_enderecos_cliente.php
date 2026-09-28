<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $clientes = DB::table('tbl_clientes')->get();

        foreach ($clientes as $cliente) {
            DB::table('tbl_enderecos_cliente')->insert([
                'id_cliente' => $cliente->id_cliente,
                'nome_endereco' => 'Endereço principal',
                'endereco' => $cliente->endereco_cliente,
                'numero' => $cliente->numero_cliente,
                'complemento' => $cliente->complemento_cliente,
                'bairro' => $cliente->bairro_cliente,
                'cidade' => $cliente->cidade_cliente,
                'uf' => $cliente->uf_cliente,
                'cep' => $cliente->cep_cliente,
                'principal_endereco' => 'SIM',
                'status_endereco' => 'ATIVO',
                'criado_em_endereco' => $cliente->criado_em_cliente,
                'atualizado_em_endereco' => $cliente->atualizado_em_cliente,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};