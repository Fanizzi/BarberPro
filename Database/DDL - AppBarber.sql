CREATE DATABASE db_appbarber;

USE db_appbarber;

-- Criação da tabela Barbearia
CREATE TABLE Barbearia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_barbearia VARCHAR(100) NOT NULL,
    nome_contato VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(16) NOT NULL,
    telefone CHAR(11) NOT NULL,
    cnpj VARCHAR(14) NOT NULL
);

-- Criação da tabela Servicos
CREATE TABLE Servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_barbearia INT NOT NULL,
    servico VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_barbearia) REFERENCES Barbearia(id)
);

-- Criação da tabela Cliente
CREATE TABLE Cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(16) NOT NULL,
    telefone CHAR(11) NOT NULL,
    avatar VARCHAR(255) NOT NULL,
    id_servico INT,
    FOREIGN KEY (id_servico) REFERENCES Servicos(id)
);

-- Criação da tabela Lembretes
CREATE TABLE Lembretes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_servico INT,
    id_barbearia INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id),
    FOREIGN KEY (id_servico) REFERENCES Servicos(id),
    FOREIGN KEY (id_barbearia) REFERENCES Barbearia(id)
);

-- Criação da tabela Cliente_Lembrete_Assoc
CREATE TABLE Cliente_Lembrete_Assoc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_lembretes INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id),
    FOREIGN KEY (id_lembretes) REFERENCES Lembretes(id)
);

CREATE TABLE Agendamentos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	data_agendamento DATE NOT NULL,
	id_cliente INT NOT NULL,
	id_barbearia INT NOT NULL,
	id_servico INT NOT NULL
);


SELECT * FROM Cliente;
