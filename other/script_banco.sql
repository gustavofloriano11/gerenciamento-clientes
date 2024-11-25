DROP DATABASE IF EXISTS gerenciamento_clientes;

CREATE DATABASE gerenciamento_clientes;

USE gerenciamento_clientes;

CREATE TABLE cliente(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone CHAR(11) NOT NULL,
    CPF CHAR(11) NOT NULL
);

CREATE TABLE funcionario(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_funcionario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone CHAR(11) NOT NULL
);

CREATE TABLE solicitacao(
	id_solicitacao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_funcionario INT, 
    urgencia VARCHAR(5) NOT NULL,
    descricao TEXT NOT NULL,
    status_solicitacao VARCHAR(12) NOT NULL,
    data_abertura DATE,
    FOREIGN KEY (id_cliente) REFERENCES cliente (id),
    FOREIGN KEY (id_funcionario) REFERENCES funcionario (id)
);