CREATE DATABASE Frikili;
USE Frikili;

CREATE TABLE IF NOT EXISTS users(
id          int(11) auto_increment not null,
email       varchar(180),
role        json,
password    varchar (255),
baneado     tinyint(1),
name        varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', 'contraseña', 'admin', null);

CREATE TABLE profesion(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb;




