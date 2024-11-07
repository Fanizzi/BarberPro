<?php

namespace App\DAO;
use \PDO;

use App\Model\CadastroModel;

class CadastroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(CadastroModel $model)
    {
        $sql = "INSERT INTO Cliente (nome, email, senha, telefone, id_servico)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->telefone);
        $stmt->bindValue(5, $model->id_servico);

        $stmt->execute();
    }

    public function update(CadastroModel $model)
    {
        $sql = "UPDATE Cliente SET nome=?, email=?, senha=?, telefone=?, id_servico=? WHERE email=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->telefone);
        $stmt->bindValue(5, $model->id_servico);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Cliente";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById(int $id)
    {
        include_once "Model/CadastroModel.php";

        $sql = "SELECT * FROM Cliente WHERE id=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\CadastroModel");
    }
}