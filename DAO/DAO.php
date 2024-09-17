<?php

namespace AppBarber\DAO;

use PDO;

abstract class DAO
{
    protected $conexao;

    public function __construct()
    {
        $dns = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        $this->conexao = new PDO($dns, $_ENV['db']['user'], $_ENV['db']['pass']);
    }
}