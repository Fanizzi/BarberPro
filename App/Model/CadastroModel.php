<?php

namespace App\Model;

use App\DAO\CadastroDAO;

class CadastroModel extends Model
{
    public $id, $nome, $email, $senha, $telefone, $avatar, $id_servico;

    public function save()
    {
        $dao = new CadastroDAO();

        // Define o caminho da imagem padrão se o avatar não estiver configurado
        if (empty($this->avatar)) {
            $this->avatar = '/uploads/avatars/user-icon.png';
        }

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
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

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CadastroModel();
    }
}