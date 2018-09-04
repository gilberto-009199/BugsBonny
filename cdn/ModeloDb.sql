/**
 * Author:  administrador
 * Created: 02/09/2018
 */

CREATE DATABASE IF NOT EXISTS bugbunny;

CREATE USER IF NOT EXISTS 'userbugbunny'@'%' IDENTIFIED BY 'abracadabra127';

GRANT INSERT, SELECT, UPDATE, DELETE ON bugbunny.* TO 'userbugbunny'@'%'; 

Use bugbunny;


CREATE table IF NOT EXISTS tbl_tipos_tickets(id int primary key auto_increment,tipo varchar(100)not null unique);

CREATE table IF NOT EXISTS tbl_profissao(id int primary key auto_increment,profissao varchar(100)not null unique);

CREATE TABLE IF NOT EXISTS tbl_tickets(id int primary key auto_increment,idTipo int not null, nome varchar(100)not null,
 telefone varchar(16)null, celular varchar(17) not null,email varchar(100) not null,
 website varchar(256) null, facebook varchar(126) not null,critica TEXT(1024) not null,
 infoPedido varchar(128) null,sexo char(2)not null, idProfissao int not null,dataCriacao datetime not null,
 FOREIGN KEY (`idTipo`) REFERENCES `tbl_tipos_tickets` (`id`),
 FOREIGN KEY (`idProfissao`) REFERENCES `tbl_profissao` (`id`));
 
/* Tipos de Tickets*/
insert into tbl_tipos_tickets(tipo)values('Consulta');
insert into tbl_tipos_tickets(tipo)values('Reportar Erro');
insert into tbl_tipos_tickets(tipo)values('Pedido de Atualização');
insert into tbl_tipos_tickets(tipo)values('Pedido de Alteração');
insert into tbl_tipos_tickets(tipo)values('Contactar ADM');
insert into tbl_tipos_tickets(tipo)values('Promoções');
insert into tbl_tipos_tickets(tipo)values('Recuperar Boleto/2°via');
insert into tbl_tipos_tickets(tipo)values('Reportar falha na Entrega');

/* Profissões  */
insert into tbl_profissao(profissao)values('Cabeleireiro');
insert into tbl_profissao(profissao)values('Sapateiro');
insert into tbl_profissao(profissao)values('Vendedor');
insert into tbl_profissao(profissao)values('Outro');
insert into tbl_profissao(profissao)values('Açougueiro');
insert into tbl_profissao(profissao)values('Advogado');
insert into tbl_profissao(profissao)values('Alfaiate');
insert into tbl_profissao(profissao)values('Aprendiz');
insert into tbl_profissao(profissao)values('Atendente');
insert into tbl_profissao(profissao)values('DBA');
insert into tbl_profissao(profissao)values('Dentista');
insert into tbl_profissao(profissao)values('Desenhista');
insert into tbl_profissao(profissao)values('Designer');
insert into tbl_profissao(profissao)values('Documentado');
insert into tbl_profissao(profissao)values('Doméstica');
insert into tbl_profissao(profissao)values('Professor');
insert into tbl_profissao(profissao)values('Guarda');
insert into tbl_profissao(profissao)values('Programador');
insert into tbl_profissao(profissao)values('Motorista');
insert into tbl_profissao(profissao)values('Jornalista');
insert into tbl_profissao(profissao)values('Engenheiro');
insert into tbl_profissao(profissao)values('Apresentador');
insert into tbl_profissao(profissao)values('Investigador');
insert into tbl_profissao(profissao)values('Policial');
insert into tbl_profissao(profissao)values('Enfermeiro');
insert into tbl_profissao(profissao)values('Medico');
insert into tbl_profissao(profissao)values('Politico');
insert into tbl_profissao(profissao)values('Diretor');
insert into tbl_profissao(profissao)values('Gerente');
insert into tbl_profissao(profissao)values('Garçom');
insert into tbl_profissao(profissao)values('Jornaleiro');
insert into tbl_profissao(profissao)values('Jardineiro');
insert into tbl_profissao(profissao)values('letricista');
insert into tbl_profissao(profissao)values('Musico');
insert into tbl_profissao(profissao)values('Nutricionista');
insert into tbl_profissao(profissao)values('Psicólogo');
insert into tbl_profissao(profissao)values('Publicitário');
insert into tbl_profissao(profissao)values('Químico');
insert into tbl_profissao(profissao)values('Radialista');
insert into tbl_profissao(profissao)values('Salva Vidas');
insert into tbl_profissao(profissao)values('Síndico');
insert into tbl_profissao(profissao)values('Serralheiro');
insert into tbl_profissao(profissao)values('Sorveteiro');
insert into tbl_profissao(profissao)values('Tecnico TI');
insert into tbl_profissao(profissao)values('Tapeceiro');
insert into tbl_profissao(profissao)values('Veterinário');
insert into tbl_profissao(profissao)values('Zelador');
insert into tbl_profissao(profissao)values('Arquiteto');
insert into tbl_profissao(profissao)values('Artesão');
insert into tbl_profissao(profissao)values('Auditor');
insert into tbl_profissao(profissao)values('Assistente');
insert into tbl_profissao(profissao)values('Babá');
insert into tbl_profissao(profissao)values('Back Office');
insert into tbl_profissao(profissao)values('Balanceiro');
insert into tbl_profissao(profissao)values('Balconista');
insert into tbl_profissao(profissao)values('Bamburista');
insert into tbl_profissao(profissao)values('Barista');
insert into tbl_profissao(profissao)values('Barman');
insert into tbl_profissao(profissao)values('Berçarista');
insert into tbl_profissao(profissao)values('Bibliotecário');
insert into tbl_profissao(profissao)values('Bilheteiro');
insert into tbl_profissao(profissao)values('Biologista');
insert into tbl_profissao(profissao)values('Biólogo');
insert into tbl_profissao(profissao)values('Biomédico');
insert into tbl_profissao(profissao)values('Bioquímico');
insert into tbl_profissao(profissao)values('Biotecnólogo');
insert into tbl_profissao(profissao)values('Blogueiro');
insert into tbl_profissao(profissao)values('Bombeiro');
insert into tbl_profissao(profissao)values('Borracheiro');

select * from tbl_profissao;

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'João Paulo','(11)4368-8975','(11)97589-6587','joaopaulo19@mail.com','webtmpXP2.net','facebook.com/joaopaulo19','Acresentar a Revista SOAP','Revistas','M','19','2018-09-04 10:10:01');

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'Gilberto Ramos','(11)4587-8541','(11)98578-5764','gilbert.tec@vivaldi.net','','facebook.com/gilberto.tec','Adicionar Jornal New York Times','Jornal','M','43','2018-09-04 14:36:18');

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'Elizabeth Alves de Moraes','(11)4588-8541','(11)98298-5617','elizabeth58@reno.com','','en.facebook.com/elizabeth58','Adicionar Jornal New York Times','Jornal','M','43','2018-09-03 10:10:18');


select * from tbl_tickets;

select t.nome, p.profissao, tt.tipo from tbl_tickets as t, tbl_profissao as p, tbl_tipos_tickets as tt where t.idProfissao=p.id and t.idTipo=tt.id;

