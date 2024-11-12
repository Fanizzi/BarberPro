<?php

namespace App\DAO;

use App\Model\AgendamentosModel;
use \PDO;

class AgendamentosDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectById($id_cliente)
    {
        $sql = "SELECT * FROM Agendamentos WHERE id_cliente = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_cliente);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Model\AgendamentosModel');
    }
}