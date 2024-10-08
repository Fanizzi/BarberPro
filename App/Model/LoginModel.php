<?php

namespace App\Model;

use App\DAO\LoginDAO;

class LoginModel extends Model
{
    public $email, $senha;

    public function authenticate()
    {
        $dao = new LoginDAO();

        $dados_usuario_logado = $dao->selectByEmailAndSenha($this->email, $this->senha);

        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;
    }
}