mysql -u root
CREATE DATABASE miniblog;
USE miniblog;

CREATE TABLE post(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	titulo CHAR(40), 
	conteudo MEDIUMTEXT,
	autor CHAR (50),
	data TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comentarios(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	autor CHAR (50),
	coment MEDIUMTEXT,
	idpost INT NOT NULL,
	FOREIGN KEY(idpost) REFERENCES post(id)
);

CREATE TABLE usuarios(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome varchar(100) NOT NULL,
	login varchar(100) NOT NULL,
	senha char(32) NOT NULL
);