<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    protected $table = "tbl_usuarios";
    protected $primaryKey = 'id_usuario';

    public $timestamps = true;


    const UPDATED_AT = 'criado_em_usuario';
    const CREATED_AT = 'atualizado_em_usuario';

    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'perfil_usuario',
        'foto_usuario',
        'status_usuario',
    ];

    protected $hidden = ['senha_usuario'];

    public function getAuthPassword()
    {
        return $this->senha_usuario;
    }

    // OU, MÉTODO ALTERNATIVO PARA DEFINIR A SENHA DO USUÁRIO PARA AUTENTICAÇÃO:
    // public function getAuthPassword()
    // {
    //     return $this->senha_usuario;
    // }
}
