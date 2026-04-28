<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $table = "tbl_categoria";
    protected $primaryKey = 'id_categoria';

    public $timestamps = true;

    const UPDATED_AT = 'criado_em_categoria';
    const CREATED_AT = 'atualizado_em_categoria';

    protected $fillable = [
        'nome_categoria',
        'descricao_categoria',
    ];

}
