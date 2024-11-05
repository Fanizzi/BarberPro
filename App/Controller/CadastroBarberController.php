<?php

namespace App\Controller;

use App\Model\CadastroBarberModel;

class CadastroBarberController extends Controller
{
    public static function index()
    {
        parent::render('/Cadastro/FormCadastroBarbearia');
    }

    public static function form()
    {
        $model = new CadastroModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        parent::render('/Cadastro/FormCadastroBarbearia', $model);
    }

    public static function save()
    {
        $cadastro = new CadastroModel();

        // Verifica se 'id' existe antes de acessá-lo
        $cadastro->id = isset($_POST['id']) ? $_POST['id'] : null; // ou um valor padrão
        $cadastro->nome_barbearia = $_POST['nome_barbearia'];
        $cadastro->nome_contato = $_POST['nome_contato'];
        $cadastro->email = $_POST['email'];
        $cadastro->senha = $_POST['senha'];
        $cadastro->telefone = $_POST['telefone'];
        $cadastro->cpf = $_POST['cpf'];
        
        // Opcionalmente, você pode adicionar validação aqui para garantir que os campos obrigatórios estejam preenchidos

        $cadastro->save();

        header("Location: /login_barbershop");
    }

}