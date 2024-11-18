<?php

namespace App\Model;

use App\DAO\CadastroBarberDAO;

class CadastroBarberModel extends Model
{
    public $id, $nome_contato, $nome_barbearia, $email, $senha, $telefone, $cnpj, $id_endereco, $banner;

    public function save()
    {
        $dao = new CadastroBarberDAO();

        // Verifica se o e-mail já existe
        if ($dao->emailExists($this->email)) {
            // Redireciona para a página de erro ou retorna uma mensagem
            header('Location: /erro_email_existente'); // Substitua pela rota adequada
            exit;
        }

        // Continua com o processo de salvamento
        if (empty($this->id)) {
            $dao->insert($this);
        }

        header('Location: /login_barbershop');
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