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
            $table->foreign('id_endereco')
                ->references('id_endereco')
                ->on('tbl_enderecos_cliente');

            $table->foreign('id_cupom')
                ->references('id_cupom')
                ->on('tbl_cupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_vendas', function (Blueprint $table) {
            $table->dropForeign(['id_endereco']);
            $table->dropForeign(['id_cupom']);
        });
    }
};