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
        Schema::create('tbl_depoimentos', function (Blueprint $table) {
            $table->increments('id_depoimento');
            $table->unsignedInteger('id_cliente');
            $table->text('texto_depoimento');
            $table->unsignedTinyInteger('nota_depoimento');
            $table->string('status_depoimento', 20)->default('PENDENTE');
            $table->dateTime('criado_em_depoimento')->useCurrent();
            $table->dateTime('atualizado_em_depoimento')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_depoimentos');
    }
};
