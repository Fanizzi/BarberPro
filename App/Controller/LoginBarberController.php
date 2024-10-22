<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginBarberController extends Controller
{
    public static function index()
    {
        parent::render('/Login/FormLoginBarber');
    }

    public static function auth()
    {
        $model = new LoginModel();

        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->authenticate();

        if ($usuario_logado !== null) {
            $_SESSION['usuario_logado'] = $usuario_logado;

            header("Location: /main");
        }
        else {
            header("Location: /login?erro=true");
        }
    }

    public static function logout()
    {
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }
}