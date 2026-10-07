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
        DB::table('tbl_banner')->insert([
            'nome_banner' => 'home-confeitaria',
            'titulo_banner' => 'Confeitaria saudável',
            'subtitulo_banner' => 'Doces fit feitos com carinho',
            'descricao_banner' => null,
            'texto_botao_banner' => 'Ver cardápio',
            'link_botao_banner' => '/cardapio',
            'ordem_banner' => 4,
            'foto_banner' => 'banner/home-confeitaria.png',
            'status_banner' => 'ATIVO',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tbl_banner')
            ->where('nome_banner', 'home-confeitaria')
            ->delete();
    }
};