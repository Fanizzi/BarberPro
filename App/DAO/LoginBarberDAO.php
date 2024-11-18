<?php

namespace App\DAO;

use PDO;
use App\Model\LoginBarberModel;
use App\Model\EnderecoModel;

class LoginBarberDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectByEmailAndSenha($email, $senha)
    {
        $sql = "SELECT * FROM Barbearia WHERE email = ? AND senha = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$email, $senha]);

        return $stmt->fetchObject(LoginBarberModel::class);
    }

    public function insert(LoginBarberModel $model)
    {
        // Cria uma nova instância do EnderecoModel para armazenar os dados de endereço
        $endereco = new EnderecoModel();
        $endereco->logradouro = $_POST['logradouro'];
        $endereco->numero = $_POST['numero'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->estado = $_POST['estado'];
        $endereco->cep = $_POST['cep'];
        $id_endereco = $endereco->save(); // Salva o endereço e obtém o ID

        // Insere os dados da barbearia, incluindo o id_endereco
        $sql = "INSERT INTO Barbearia (nome_barbearia, nome_contato, email, senha, telefone, cnpj, id_endereco, banner) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome_barbearia);
        $stmt->bindValue(2, $model->nome_contato);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->senha);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->cnpj);
        $stmt->bindValue(7, $id_endereco);
        $stmt->bindValue(8, $model->banner);

        $stmt->execute();
        return $this->conexao->lastInsertId();
    }
}
