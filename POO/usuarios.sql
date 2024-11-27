CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    sobrenome VARCHAR(100),
    cpf VARCHAR(14),
    data_nascimento DATE,
    genero VARCHAR(20),
    email VARCHAR(100),
    telefone_residencial VARCHAR(15),
    telefone_comercial VARCHAR(15),
    endereco1 VARCHAR(255),
    endereco2 VARCHAR(255),
    codigo_postal VARCHAR(10),
    cidade VARCHAR(100),
    estado VARCHAR(100),
    renda DECIMAL(10, 2),
    foto LONGBLOB
);


CREATE DATABASE sistema_login;
USE sistema_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
