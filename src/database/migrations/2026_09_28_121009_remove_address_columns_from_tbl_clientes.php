<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_clientes', function (Blueprint $table) {
            $table->dropColumn([
                'endereco_cliente',
                'numero_cliente',
                'complemento_cliente',
                'bairro_cliente',
                'cidade_cliente',
                'uf_cliente',
                'cep_cliente',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_clientes', function (Blueprint $table) {
            $table->string('endereco_cliente', 40);
            $table->string('numero_cliente', 6);
            $table->string('complemento_cliente', 50)->nullable();
            $table->string('bairro_cliente', 40);
            $table->string('cidade_cliente', 40);
            $table->string('uf_cliente', 2);
            $table->string('cep_cliente', 9);
        });
    }
};