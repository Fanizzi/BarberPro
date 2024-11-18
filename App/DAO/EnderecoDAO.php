<?php

namespace App\DAO;

use PDO;
use App\Model\EnderecoModel;

class EnderecoDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(EnderecoModel $model)
    {
        $sql = "INSERT INTO endereco (logradouro, numero, cidade, estado, cep)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->logradouro);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->cidade);
        $stmt->bindValue(4, $model->estado);
        $stmt->bindValue(5, $model->cep);

        $stmt->execute();

        return $this->conexao->lastInsertId(); // Retorna o ID do endereço inserido
    }
}
