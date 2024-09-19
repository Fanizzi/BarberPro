<?php

namespace App\Model;

use App\DAO\CadastroDAO;

class CadastroModel extends Model
{
    public $id, $nome, $email, $senha, $telefone;

    public function save()
    {
        $dao = new CadastroDAO();

        if(empty($this->id))
        {
            $dao->insert($this);
        }

        header('Location: /login');
    }

    public function update()
    {
        $dao = new CadastroDAO();

        $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new CadastroDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new CadastroDAO();

        $obj = $dap->selectById($id);

        return ($obj) ? $obj : new CadastroModel();
    }
}