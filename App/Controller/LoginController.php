<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends Controller
{
    public static function index()
    {
        parent::render('/Login/FormLogin');
    }

    public static function auth()
    {
        $model = new LoginModel();

        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->authenticate();

        if ($usuario_logado !== null) {

            // Define o avatar padrão se o usuário não tiver um avatar
            if (empty($usuario_logado->avatar)) {
                $usuario_logado->avatar = '/uploads/avatars/user-icon.png';
            }

            $_SESSION['usuario_logado'] = serialize($usuario_logado);

            header("Location: /main");
            exit;
        }
        else {
            header("Location: /login?erro=true");
            exit;
        }
    }

    public static function logout()
    {
        // Destrói todos os dados da sessão
        session_unset(); // Remove todas variaveis da sessao
        session_destroy(); // Destroi a sessao completamente

        // Redireciona para a página de login
        header("Location: /login");
        exit();
    }
}