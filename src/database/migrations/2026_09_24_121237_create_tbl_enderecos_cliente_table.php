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
        Schema::create('tbl_enderecos_cliente', function (Blueprint $table) {
            $table->increments('id_endereco');
            $table->unsignedInteger('id_cliente');
            $table->string('nome_endereco', 50);
            $table->string('endereco', 40);
            $table->string('numero', 6);
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 40);
            $table->string('cidade', 40);
            $table->string('uf', 2);
            $table->string('cep', 9);
            $table->string('principal_endereco', 3)->default('SIM');
            $table->string('status_endereco', 10)->default('ATIVO');
            $table->dateTime('criado_em_endereco')->useCurrent();
            $table->dateTime('atualizado_em_endereco')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_enderecos_cliente');
    }
};