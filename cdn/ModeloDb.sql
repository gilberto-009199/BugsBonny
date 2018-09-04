/**
 * Author:  administrador
 * Created: 02/09/2018
 */

CREATE DATABASE IF NOT EXISTS bugbunny;

CREATE USER 'userbugbunny'@'%' IDENTIFIED BY 'abracadabra127';

GRANT INSERT, SELECT, UPDATE, DELETE ON bugbunny.* TO 'userbugbunny'@'%'; 

Use bugbunny;


CREATE table IF NOT EXISTS tbl_tipos_tickets(id int primary key auto_increment,tipo varchar(100)not null unique);

CREATE table IF NOT EXISTS tbl_Profissao(id int primary key auto_increment,profissao varchar(100)not null unique);

CREATE TABLE IF NOT EXISTS tbl_tickets(id int primary key auto_increment,idTipo int not null, nome varchar(100)not null,
 telefone varchar(14)null, celular varchar(14) not null,email varchar(100) not null,
 website varchar(100) null, facebook varchar(100) not null,critica TEXT(1024) not null,
 infoPedido varchar(128) null,sexo char(2)not null, idProfissao int not null,dataCriacao datetime not null,
 FOREIGN KEY (`idTipo`) REFERENCES `tbl_tipos_tickets` (`id`),
 FOREIGN KEY (`idProfissao`) REFERENCES `tbl_Profissao` (`id`));
 
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
insert into tbl_Profissao(profissao)values('Cabeleireiro');
insert into tbl_Profissao(profissao)values('Sapateiro');
insert into tbl_Profissao(profissao)values('Vendedor');
insert into tbl_Profissao(profissao)values('Motorista de Caminhão');
insert into tbl_Profissao(profissao)values('Outro');
insert into tbl_Profissao(profissao)values('Açougueiro');
insert into tbl_Profissao(profissao)values('Advogado');
insert into tbl_Profissao(profissao)values('Alfaiate');
insert into tbl_Profissao(profissao)values('Aprendiz');
insert into tbl_Profissao(profissao)values('Atendente');
insert into tbl_Profissao(profissao)values('DBA');
insert into tbl_Profissao(profissao)values('Dentista');
insert into tbl_Profissao(profissao)values('Desenhista');
insert into tbl_Profissao(profissao)values('Designer');
insert into tbl_Profissao(profissao)values('Documentado');
insert into tbl_Profissao(profissao)values('Doméstica');
insert into tbl_Profissao(profissao)values('Professor');
insert into tbl_Profissao(profissao)values('Guarda');
insert into tbl_Profissao(profissao)values('Programador');
insert into tbl_Profissao(profissao)values('Motorista');
insert into tbl_Profissao(profissao)values('Jornalista');
insert into tbl_Profissao(profissao)values('Engenheiro');
insert into tbl_Profissao(profissao)values('Apresentador');
insert into tbl_Profissao(profissao)values('Investigador');
insert into tbl_Profissao(profissao)values('Policial');
insert into tbl_Profissao(profissao)values('Enfermeiro');
insert into tbl_Profissao(profissao)values('Medico');
insert into tbl_Profissao(profissao)values('Politico');
insert into tbl_Profissao(profissao)values('Diretor');
insert into tbl_Profissao(profissao)values('Gerente');
insert into tbl_Profissao(profissao)values('Garçom');
insert into tbl_Profissao(profissao)values('Jornaleiro');
insert into tbl_Profissao(profissao)values('Jardineiro');
insert into tbl_Profissao(profissao)values('letricista');
insert into tbl_Profissao(profissao)values('Musico');
insert into tbl_Profissao(profissao)values('Nutricionista');
insert into tbl_Profissao(profissao)values('Psicólogo');
insert into tbl_Profissao(profissao)values('Publicitário');
insert into tbl_Profissao(profissao)values('Químico');
insert into tbl_Profissao(profissao)values('Radialista');
insert into tbl_Profissao(profissao)values('Salva Vidas');
insert into tbl_Profissao(profissao)values('Síndico');
insert into tbl_Profissao(profissao)values('Serralheiro');
insert into tbl_Profissao(profissao)values('Sorveteiro');
insert into tbl_Profissao(profissao)values('Tecnico TI');
insert into tbl_Profissao(profissao)values('Tapeceiro');
insert into tbl_Profissao(profissao)values('Veterinário');
insert into tbl_Profissao(profissao)values('Zelador');
insert into tbl_Profissao(profissao)values('Arquiteto');
insert into tbl_Profissao(profissao)values('Artesão');
insert into tbl_Profissao(profissao)values('Auditor');
insert into tbl_Profissao(profissao)values('Assistente');
insert into tbl_Profissao(profissao)values('Babá');
insert into tbl_Profissao(profissao)values('Back Office');
insert into tbl_Profissao(profissao)values('Back Office de Vendas');
insert into tbl_Profissao(profissao)values('Balanceiro');
insert into tbl_Profissao(profissao)values('Balconista');
insert into tbl_Profissao(profissao)values('Bamburista');
insert into tbl_Profissao(profissao)values('Barista');
insert into tbl_Profissao(profissao)values('Barman');
insert into tbl_Profissao(profissao)values('Berçarista');
insert into tbl_Profissao(profissao)values('Bibliotecário');
insert into tbl_Profissao(profissao)values('Bilheteiro');
insert into tbl_Profissao(profissao)values('Biologista');
insert into tbl_Profissao(profissao)values('Biólogo');
insert into tbl_Profissao(profissao)values('Biomédico');
insert into tbl_Profissao(profissao)values('Bioquímico');
insert into tbl_Profissao(profissao)values('Biotecnólogo');
insert into tbl_Profissao(profissao)values('Blogueiro');
insert into tbl_Profissao(profissao)values('Bombeiro Civil');
insert into tbl_Profissao(profissao)values('Bombeiro Industrial');
insert into tbl_Profissao(profissao)values('Borracheiro');

select * from tbl_profissao;

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'gil','4303-6886','11947581604','gilberto.tec@vivaldi.net','','facebook.com/gilberto.ramos1999','Acresentar a Revista SOAP','Revistas','M','19','2018-09-04 10:10:01');

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'Gilberto Ramos','83734-242342','11 946289463','gilbert.tec@vivaldi.net','','facebook.com/gilberto.ramos1999','Adicionar Jornal New York Times','Jornal','M','43','2018-09-04 14:36:18');

select * from tbl_tickets; 