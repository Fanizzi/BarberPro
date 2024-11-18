<?php

namespace App\Model;

use App\DAO\LoginDAO;

class LoginModel extends Model
{
    public $id, $email, $senha, $nome, $avatar;

    public function authenticate()
    {
        $dao = new LoginDAO();

        $dados_usuario_logado = $dao->selectByEmailAndSenha($this->email, $this->senha);

        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;
    }

    // Método para obter as informações do usuário logado
    public function getUserInfo($id)
    {
        $dao = new LoginDAO();
        return $dao->selectById($id); // Crie ou ajuste o método selectById no LoginDAO para obter nome e avatar
    }
}