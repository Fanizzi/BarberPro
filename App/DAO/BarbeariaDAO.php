<?php

namespace App\DAO;

use PDO;

class BarbeariaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBarbearias()
    {
        $sql = "SELECT * FROM Barbearia";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}