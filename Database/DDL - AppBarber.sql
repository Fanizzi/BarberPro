CREATE DATABASE db_appbarber;

USE db_appbarber;

CREATE TABLE Servicos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    servico VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao VARCHAR(255) NOT NULL
);

CREATE TABLE Cliente(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(16) NOT NULL,
    telefone CHAR(11) NOT NULL,
    id_servico INT NOT NULL,
    id_Cliente_Lembrete_Assoc INT NOT NULL,
    FOREIGN KEY(id_servico) REFERENCES Servicos(id),
    FOREIGN KEY(id_Cliente_Lembrete_Assic) REFERENCES Cliente_Lembrete_Assoc(id)
);

CREATE TABLE Cliente_Lembrete_Assoc(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_lembretes INT NOT NULL,
    FOREIGN KEY(id_cliente) REFERENCES Cliente(id),
    FOREIGN KEY(id_lembretes) REFERENCES Lembretes(id)
);

CREATE TABLE Barbearia(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_barbearia VARCHAR(100) NOT NULL,
    nome_contato VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(16) NOT NULL,
    telefone CHAR(11) NOT NULL,
    cpf CHAR(11) NOT NULL
);

CREATE TABLE Lembretes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_nome INT NOT NULL,
    id_servico INT NOT NULL,
    id_nome_barbearia INT NOT NULL,
    id_valor INT NOT NULL,
    FOREIGN KEY(id_nome) REFERENCES Cliente(id),
    FOREIGN KEY(id_servico) REFERENCES Servicos(id),
    FOREIGN KEY(id_nome_barbearia) REFERENCES Barbearia(id),
    FOREIGN KEY(id_valor) REFERENCES Servicos(id)
);

