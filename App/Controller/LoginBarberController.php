<?php

namespace App\Controller;

use App\Model\LoginBarberModel;
use App\Model\EnderecoModel;

class LoginBarberController extends Controller
{
    public static function index()
    {
        parent::render('/Login/FormLoginBarber');
    }

    public static function auth()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Instância e chama o método authenticate para validar credenciais
        $barber = new LoginBarberModel();
        $barber->email = $email;
        $barber->senha = $senha;

        $authenticatedBarber = $barber->authenticate();

        if ($authenticatedBarber) {
            session_start();
            $_SESSION['barber_logado'] = [
                'id' => $authenticatedBarber->id,
                'nome_barbearia' => $authenticatedBarber->nome_barbearia,
                'banner' => $authenticatedBarber->banner,
            ];
            header("Location: /barber_dashboard");
        } else {
            header("Location: /login_barbershop?erro=1");
        }
    }

    public static function save()
    {
        // Cria um novo modelo de endereço e salva no banco de dados
        $enderecoModel = new EnderecoModel();
        $enderecoModel->logradouro = $_POST['logradouro'];
        $enderecoModel->numero = $_POST['numero'];
        $enderecoModel->cidade = $_POST['cidade'];
        $enderecoModel->estado = $_POST['estado'];
        $enderecoModel->cep = $_POST['cep'];

        // Salva o endereço e obtém o ID retornado
        $id_endereco = $enderecoModel->save();

        // Cria um novo modelo de barbearia e atribui o id_endereco
        $barberModel = new LoginBarberModel();
        $barberModel->nome_barbearia = $_POST['nome_barbearia'];
        $barberModel->nome_contato = $_POST['nome_contato'];
        $barberModel->email = $_POST['email'];
        $barberModel->senha = $_POST['senha'];
        $barberModel->telefone = $_POST['telefone'];
        $barberModel->cnpj = $_POST['cnpj'];
        $barberModel->id_endereco = $id_endereco;

        // Lógica para o upload da imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $barberModel->banner = "uploads/barbearias/" . uniqid() . ".$ext";
            move_uploaded_file($_FILES['imagem']['tmp_name'], $barberModel->banner);
        } else {
            $barberModel->banner = "uploads/barbearias/barber-banner.png";
        }

        // Salva o modelo de barbearia com o id_endereco associado
        $barberModel->save();
        header("Location: /login_barbershop");
    }


    public static function logout()
    {
        // Destrói todos os dados da sessão
        session_unset(); // Remove todas variaveis da sessao
        session_destroy(); // Destroi a sessao completamente

        // Redireciona para a página de login
        header("Location: /main");
        exit();
    }
}
