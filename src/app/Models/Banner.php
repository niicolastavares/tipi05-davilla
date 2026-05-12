<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Banner extends Model
{
    
    protected $table = "tbl_banner";
    protected $primaryKey = 'id_banner';

    // Se a tabela não tiver as colunas created_at e updated_at, colocar a linha abaixo para não dar erro
    public $timestamps = true;

    protected $fillable = [
        'nome_banner',
        'titulo_banner',
        'subtitulo_banner',
        'descricao_banner',
        'texto_botao_banner',
        'link_botao_banner',
        'ordem_banner',
        'foto_banner',
        'status_banner',
    ];

}
