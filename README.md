Meu Primeiro Repositório 
======================== 

O Git/GitHub são legais!

Mova a pasta "projetos-paineiras" para o mesmo nível da pasta "htdocs".

Configure seu email em projetos-paineiras/enviar_email.

===============================SQL======================

CREATE DATABASE paineiras;

use paineiras;

CREATE TABLE banners( id int not null primary key AUTO_INCREMENT, nome varchar(32) not null, arquivo varchar(50) not null, data timestamp not null DEFAULT now(), ativo boolean );

CREATE TABLE jobs( id int not null primary key auto_increment, vaga varchar(32) not null, setor varchar(32) not null, arquivo varchar(50) not null, datas timestamp not null default now(), assunto varchar(32) not null );

CREATE TABLE user_admin( id int not null primary key auto_increment, user varchar(32) not null, password varchar(32) not null );

INSERT INTO user_admin (user, password) VALUES ('Admin', 'Admin');
