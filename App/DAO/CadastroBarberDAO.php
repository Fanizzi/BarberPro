<?php

namespace App\DAO;
use \PDO;

use App\Model\CadastroBarberModel;

class CadastroBarberDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(CadastroBarberModel $model)
    {
        $sql = "INSERT INTO Barbearia (nome_contato, nome_barbearia, email, senha, telefone, cnpj)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome_contato);
        $stmt->bindValue(2, $model->nome_barbearia);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->cnpj);

        $stmt->execute();
    }

    public function update(CadastroBarberModel $model)
    {
        $sql = "UPDATE Barbearia SET nome_contato=?, nome_barbearia=?, email=?, senha=?, telefone=? WHERE email=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome_contato);
        $stmt->bindValue(2, $model->nome_barbearia);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->cnpj);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Barbearia";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById(int $id)
    {
        include_once "Model/CadastroBarberModel.php";

        $sql = "SELECT * FROM Barbearia WHERE id=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\CadastroBarberModel");
    }
}