<?php

namespace App\Controller;

use App\Model\CadastroModel;

class CadastroController extends Controller
{
    public static function index()
    {
        parent::render('/Cadastro/FormCadastroCliente');
    }

    public static function form()
    {
        $model = new CadastroModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        parent::render('/Cadastro/FormCadastroCliente', $model);
    }

    public static function save ()
    {
        $cadastro = new CadastroModel();

        $cadastro->id = $_POST['id'];
        $cadastro->nome = $_POST['nome'];
        $cadastro->email = $_POST['email'];
        $cadastro->senha = $_POST['senha'];
        $cadastro->telefone = $_POST['telefone'];
        $cadastro->save();

        header("Location: /login");
    }
}