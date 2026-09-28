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
        Schema::create('tbl_cupons', function (Blueprint $table) {
            $table->increments('id_cupom');
            $table->string('codigo_cupom', 30);
            $table->double('valor_desconto_cupom', 10, 2);
            $table->dateTime('data_inicio_cupom');
            $table->dateTime('data_fim_cupom');
            $table->string('status_cupom', 10)->default('ATIVO');
            $table->dateTime('criado_em_cupom')->useCurrent();
            $table->dateTime('atualizado_em_cupom')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cupons');
    }
};