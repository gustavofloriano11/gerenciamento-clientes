DROP DATABASE IF EXISTS gerenciamento_clientes;

CREATE DATABASE gerenciamento_clientes;

USE gerenciamento_clientes;

CREATE TABLE clientes(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone CHAR(11) NOT NULL,
    CPF CHAR(11) NOT NULL
);

CREATE TABLE funcionario(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone CHAR(11) NOT NULL
);

CREATE TABLE solicitacao(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_funcionario INT, 
    urgencia VARCHAR(5) NOT NULL,
    descricao TEXT NOT NULL,
    status_gerenciamento VARCHAR(12) NOT NULL,
    data_abertura DATE
);