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
        Schema::table('tbl_vendas', function (Blueprint $table) {
            $table->unsignedInteger('id_endereco')->nullable();
            $table->unsignedInteger('id_cupom')->nullable();
            $table->string('forma_pagamento_venda', 10);
            $table->string('entrega_venda', 3)->default('NAO');
            $table->text('observacao_venda')->nullable();
            $table->double('valor_desconto_venda', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_vendas', function (Blueprint $table) {
            $table->dropColumn([
                'id_endereco',
                'id_cupom',
                'forma_pagamento_venda',
                'entrega_venda',
                'observacao_venda',
                'valor_desconto_venda',
            ]);
        });
    }
};