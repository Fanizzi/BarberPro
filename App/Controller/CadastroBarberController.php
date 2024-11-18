<?php

namespace App\Controller;

use App\Model\CadastroBarberModel;
use App\Model\EnderecoModel;

class CadastroBarberController extends Controller
{
    public static function index()
    {
        parent::render('/Cadastro/FormCadastroBarbearia');
    }

    public static function form()
    {
        $model = new CadastroBarberModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        parent::render('/Login/FormLoginBarber', $model);
    }

    public static function save()
    {
            // Salvar endereço
        $endereco = new EnderecoModel();
        $endereco->logradouro = $_POST['logradouro'];
        $endereco->numero = $_POST['numero'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->estado = $_POST['estado'];
        $endereco->cep = $_POST['cep'];

        $id_endereco = $endereco->save(); // Salva e retorna o ID do endereço

        // Salvar barbearia
        $cadastro = new CadastroBarberModel();
        $cadastro->nome_barbearia = $_POST['nome_barbearia'];
        $cadastro->nome_contato = $_POST['nome_contato'];
        $cadastro->email = $_POST['email'];
        $cadastro->senha = $_POST['senha'];
        $cadastro->telefone = $_POST['telefone'];
        $cadastro->cnpj = $_POST['cnpj'];
        $cadastro->id_endereco = $id_endereco; // Associar o ID do endereço ao cadastro

        // Caminho da pasta de uploads
        $barber_banner = '/uploads/barbearia/';
        
        // Verificar se uma imagem foi enviada
        if (isset($_FILES['banner']) && $_FILES['banner']['error'] == 0) {
            $nome_arquivo = $_FILES['banner']['name'];
            $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
            $novo_nome = uniqid() . '.' . $extensao;

            // Criar a pasta se não existir
            if (!is_dir($barber_banner)) {
                mkdir($barber_banner, 0755, true);
            }

            // Mover o arquivo para a pasta de destino
            $caminho_completo = $barber_banner . $novo_nome;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $caminho_completo);

            // Salvar o caminho da imagem no modelo
            $cadastro->banner = $caminho_completo;
        } else {
            // Caso não tenha imagem enviada, use a imagem padrão
            $cadastro->banner = $barber_banner . '/uploads/barbearia/barber-banner.png';
        }
        
        // Opcionalmente, você pode adicionar validação aqui para garantir que os campos obrigatórios estejam preenchidos

        $cadastro->save();

        header("Location: /login_barbershop");
    }

}