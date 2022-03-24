CREATE DATABASE framework_mvc;

CREATE TABLE tb_produtos (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMEN,
	descricao VARCHAR(200) NOT NULL,
	preco FLOAT(8,2) NOT NULL
);

INSERT INTO tb_produtos(descricao, preco) VALUES ('Sofá', 1250.75);
INSERT INTO tb_produtos(descricao, preco) VALUES ('Cadeira', 378.99);
INSERT INTO tb_produtos(descricao, preco) VALUES ('Cama', 870.75);
INSERT INTO tb_produtos(descricao, preco) VALUES ('Notebook', 1752.49);
INSERT INTO tb_produtos(descricao, preco) VALUES ('Smartphone', 999.99);

CREATE TABLE tb_contatos(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	telefone VARCHAR(15) NOT NULL
);

INSERT INTO tb_contatos(email, telefone) VALUES ('email1@email.com', '1111-1111');
INSERT INTO tb_contatos(email, telefone) VALUES ('email2@gmail.com', '2222-2222');