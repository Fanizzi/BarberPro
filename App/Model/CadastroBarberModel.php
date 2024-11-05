<?php

namespace App\Model;

use App\DAO\CadastroBarberDAO;

class CadastroBarberModel extends Model
{
    public $id, $nome_contato, $nome_barbearia, $email, $senha, $telefone, $cnpj;

    public function save()
    {
        $dao = new CadastroBarberDAO();

        if(empty($this->id))
        {
            $dao->insert($this);
        }

        header('Location: /login');
    }

    public function update()
    {
        $dao = new CadastroBarberDAO();

        $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new CadastroBarberDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new CadastroBarberDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CadastroBarberModel();
    }
}