<?php
namespace App\Controller;

use App\Model\AgendamentosModel;

class AgendamentosController extends Controller
{
    public static function index()
    {
        parent::isAuthenticated();

        // Verifica se $_SESSION['usuario_logado'] é uma string serializada antes de desserializar
        $usuario_logado = is_string($_SESSION['usuario_logado']) 
            ? unserialize($_SESSION['usuario_logado']) 
            : $_SESSION['usuario_logado'];

        if ($usuario_logado instanceof \App\Model\LoginModel) {
            $usuario_id = $usuario_logado->id;

            // Busca os agendamentos do usuário logado
            $model = new AgendamentosModel();
            $agendamentos = $model->getAgendamentosByUsuarioId($usuario_id);

            // Passa os dados dos agendamentos para a view
            parent::render('/Agendamentos/Agendamentos', $agendamentos);
        } else {
            // Caso o objeto esteja corrompido, redireciona para o login
            header("Location: /login");
            exit;
        }
    }
}
?>