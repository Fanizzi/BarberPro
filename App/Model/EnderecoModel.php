<?php

namespace App\Model;

use App\DAO\EnderecoDAO;
use App\DAO\DAO;

class EnderecoModel extends DAO
{
    public $logradouro;
    public $numero;
    public $cidade;
    public $estado;
    public $cep;

    public function save()
    {
        $dao = new EnderecoDAO();
        return $dao->insert($this); 
    }
}
