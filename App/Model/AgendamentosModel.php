<?php

namespace App\Model;

use App\DAO\AgendamentosDAO;

class AgendamentosModel extends Model
{
    public $id, $id_cliente, $data_servico, $id_servico, $id_barbearia;

    public function getAgendamentosByUsuarioId($id_cliente)
    {
        $dao = new AgendamentosDAO();
        return $dao->selectById($id_cliente);
    }
}