<?php

namespace App\Model;

use App\DAO\LoginBarberDAO;

class LoginBarberModel extends Model
{
    public $id;
    public $nome_barbearia;
    public $nome_contato;
    public $email;
    public $senha;
    public $telefone;
    public $cnpj;
    public $banner;
    public $id_endereco;

    public function authenticate()
    {
        $dao = new LoginBarberDAO();
        return $dao->selectByEmailAndSenha($this->email, $this->senha);
    }

    public function save()
    {
        $dao = new LoginBarberDAO();
        return $dao->insert($this);
    }
}
