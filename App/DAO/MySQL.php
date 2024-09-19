<?php

class MySQL extends PDO
{
    private $dsn = 'mysql:host=localhost:3306;dbname+db_appbarber';
    private $user = 'root';
    private $pass = '';

    public function __construct() {
        return parent::__construct($this->dsn, $this->user, $this->pass);
    }
}

