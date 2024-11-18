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
        $sql = "INSERT INTO Barbearia (nome_contato, nome_barbearia, email, senha, telefone, cnpj, id_endereco, banner)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome_contato);
        $stmt->bindValue(2, $model->nome_barbearia);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->cnpj);
        $stmt->bindValue(7, $model->id_endereco); 
        $stmt->bindValue(8, $model->banner);

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

    public function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM Barbearia WHERE email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0; // Retorna true se encontrar o e-mail
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