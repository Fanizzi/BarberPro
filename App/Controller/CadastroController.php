<?php

namespace App\Controller;

use App\Model\CadastroModel;

class CadastroController extends Controller
{
    public static function index()
    {
        parent::render('/Login/FormLogin');
    }

    public static function form()
    {
        $model = new CadastroModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        parent::render('/Login/FormLogin', $model);
    }

    public static function save()
    {
        $cadastro = new CadastroModel();

        // Verifica se 'id' existe antes de acessá-lo
        $cadastro->id = isset($_POST['id']) ? $_POST['id'] : null; // ou um valor padrão
        $cadastro->nome = $_POST['nome'];
        $cadastro->email = $_POST['email'];
        $cadastro->senha = $_POST['senha'];
        $cadastro->telefone = $_POST['telefone'];

        // Caminho da pasta de uploads
        $user_avatar = '/uploads/avatars/';
        
        // Verificar se uma imagem foi enviada
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
            $nome_arquivo = $_FILES['avatar']['name'];
            $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
            $novo_nome = uniqid() . '.' . $extensao;

            // Criar a pasta se não existir
            if (!is_dir($user_avatar)) {
                mkdir($user_avatar, 0755, true);
            }

            // Mover o arquivo para a pasta de destino
            $caminho_completo = $user_avatar . $novo_nome;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $caminho_completo);

            // Salvar o caminho da imagem no modelo
            $cadastro->avatar = $caminho_completo;
        } else {
            // Caso não tenha imagem enviada, use a imagem padrão
            $cadastro->avatar = $user_avatar . '/uploads/avatars/user-icon.png';
        }

        
        // Opcionalmente, você pode adicionar validação aqui para garantir que os campos obrigatórios estejam preenchidos

        $cadastro->save();

        header("Location: /login");
    }

}