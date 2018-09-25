/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

/* Banco de dados Modelo */
CREATE DATABASE IF NOT EXISTS bugbunny;

/*CREATE USER 'userbugbunny'@'%' IDENTIFIED BY 'abracadabra127';*/

GRANT INSERT, SELECT, UPDATE, DELETE ON bugbunny.* TO 'userbugbunny'@'%'; 

Use bugbunny;

/* Tabelas  */
CREATE table IF NOT EXISTS tbl_tipos_tickets(id int primary key auto_increment,tipo varchar(100)not null unique);

CREATE table IF NOT EXISTS tbl_profissao(id int primary key auto_increment,profissao varchar(100)not null unique);

CREATE TABLE IF NOT EXISTS tbl_tickets(id int primary key auto_increment,idTipo int not null, nome varchar(100)not null,
 telefone varchar(16)null, celular varchar(17) not null,email varchar(100) not null,
 website varchar(256) null, facebook varchar(126) not null,critica TEXT(1024) not null,
 infoPedido varchar(128) null,sexo char(2)not null, idProfissao int not null,dataCriacao datetime not null,
 FOREIGN KEY (`idTipo`) REFERENCES `tbl_tipos_tickets` (`id`),
 FOREIGN KEY (`idProfissao`) REFERENCES `tbl_profissao` (`id`));
 

CREATE TABLE IF NOT EXISTS tbl_donos(id int primary key auto_increment, nome varchar(45) not null,
telefone varchar(45) not null,email varchar(128));

CREATE TABLE IF NOT EXISTS tbl_bancas(id int primary key auto_increment, nome varchar(100) not null,
uf char(2) not null, cidade varchar(100) not null, bairro varchar(45) not null,
logradouro varchar(100) not null, descrisao varchar(1024) not null,horario varchar(40) not null,
location varchar(24) not null, telefone varchar(45) not null, idDono int not null,
FOREIGN KEY (`idDono`) references `tbl_donos` (`id`));

CREATE TABLE IF NOT EXISTS tbl_usuarios(id int primary key auto_increment, nome varchar(45) not null,
email varchar(128) unique not null, senha varchar(64) not null,dataEmissao datetime not null,
telefone varchar(18) not null
);

CREATE TABLE IF NOT EXISTS  tbl_usuario_estados(id int primary key auto_increment,nome varchar(45) not null);

CREATE TABLE IF NOT EXISTS  tbl_usuario_cargos(id int primary key auto_increment,nome varchar(45) not null);

/* Tabelas Relacionamento  para ligação Tabela Usuarios = Tabela Estados */
CREATE TABLE IF NOT EXISTS tbl_estados_usuarios(id int primary key auto_increment,
idUsuario int not null, idEstado int not null, dataEmissao datetime not null,
FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuarios`(`id`),
FOREIGN KEY (`idEstado`) REFERENCES `tbl_usuario_estados`(`id`)
);

CREATE TABLE IF NOT EXISTS tbl_cargos_usuarios(id int primary key auto_increment,
idUsuario int not null, idCargo int not null, dataEmissao datetime not null,
FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuarios`(`id`),
FOREIGN KEY (`idCargo`) REFERENCES `tbl_usuario_cargos`(`id`)    
);

CREATE TABLE IF NOT EXISTS tbl_autores(id int primary key auto_increment,
nome varchar(45) not null, email varchar(128) null,sexo enum('M','F') not null);

CREATE TABLE IF NOT EXISTS tbl_noticia_categorias(id int primary key auto_increment,
nome varchar(45) not null unique);

CREATE TABLE IF NOT EXISTS tbl_noticias(id int primary key auto_increment,
idCategoria int not null, titulo varchar(128) not null,conteudo text(2028) not null,dtCriacao date not null,
estado enum('V','F') not null, FOREIGN KEY (`idCategoria`) REFERENCES `tbl_noticia_categorias`(`id`));

CREATE TABLE IF NOT EXISTS tbl_autores_noticias(id int primary key auto_increment,
idNoticia int not null,idAutor int not null,dtEmissao datetime not null,
FOREIGN KEY (`idNoticia`) REFERENCES `tbl_noticias`(`id`),
FOREIGN KEY (`idAutor`) REFERENCES `tbl_autores`(`id`));

CREATE TABLE IF NOT EXISTS tbl_artigos(id int primary key auto_increment,
titulo varchar(128) not null, conteudo text(2028) not null,
dtCriacao date not null, estado enum('V','F') not null);

CREATE TABLE IF NOT EXISTS tbl_autores_artigos(
id int primary key auto_increment,
idArtigo int not null, idAutor int not null,
dtEmissao datetime not null,
foreign key(`idArtigo`) references `tbl_artigos`(`id`),
foreign key(`idAutor`) references `tbl_autores`(`id`));

CREATE TABLE IF NOT EXISTS tbl_entrevistas(id int primary key auto_increment,
titulo varchar(128) not null,conteudo text(2028) not null,celebridade varchar(64) not null,
url varchar(64) not null,dtCriacao date not null,img varchar(80) null,
estado enum('V','F') not null);

CREATE TABLE IF NOT EXISTS tbl_autores_entrevistas(id int primary key auto_increment,
idEntrevista int not null,idAutor int not null,dtEmissao datetime not null,
foreign key (`idEntrevista`) references `tbl_entrevistas`(`id`),
foreign key (`idAutor`) references `tbl_autores`(`id`));

CREATE TABLE IF NOT EXISTS tbl_token(id int primary key auto_increment,
token varchar(64) not null,idUsuario int not null,dtEmissao datetime not null,
foreign key (`idUsuario`) references `tbl_usuarios`(`id`));

create table if not exists tbl_logs(id int primary key auto_increment,
action varchar(64) not null,idToken int not null,
dtEmissao datetime not null,ip varchar(12) null,
foreign key (`idToken`) references `tbl_token`(`id`));

/* Anotação verificar se o arquivo de imagem existe atraves do php */

insert into tbl_entrevistas(titulo,conteudo,celebridade,url,dtCriacao,estado)values(
'Entrevista com Roberto Justos',
'[justificado]Roberto Justus, um dos publicitários mais bem-sucedidos do país, O Aprendiz encalhou justamente no mercado publicitário.[/justificado][justificado] Sem anunciantes que viabilizassem a produção do programa, a Band decidiu adiar para 2019 a sua reestreia, prevista inicialmente para o final de setembro. A decisão foi tomada na (21) e confirmada em nota oficial da emissora.[/justificado]',
'Roberto Justus','http://globo.com/aprendiz.html','2017-06-20',
'V');

select * from tbl_entrevistas as e, tbl_autores_entrevistas as ae, tbl_autores as a where ae.idEntrevista= e.id and ae.idAutor = a.id;



insert into tbl_autores(nome,email,sexo)values("Cristiane Rocha","cris.rocha@mail.com","F");

insert into tbl_autores_entrevistas(idEntrevista,idAutor,dtEmissao)values(
1,1,'2017-06-20 19:30:00');

/*## Area das entrevistas -_- Autores  ##*/
/* Visualiza os titulo das entrevistas e seus autores com a data de registo e a de criacao*/
/*select e.titulo, e.celebridade,a.nome as autor from tbl_entrevistas as e, tbl_autores_entrevistas as ae, tbl_autores as a
where ae.idEntrevista=e.id and ae.idAutor = a.id;*/


insert into tbl_artigos(titulo,conteudo,dtCriacao,estado)values(
'Fundação da Bugsbunny','[justificado]A origem da nossa empresa vem de um banca de jornal criada em 1990, nessa época a empresa era dirigida somente pelo nosso amado Daffy Duck, fundador e dono da empresa.[/justificado][justificado]Depois da morte da sua esposa e filhos se dedicou as empresas de sua região, fornecendo aos administradores assinaturas de revistas e jornais para seus empregados. Com crescimento brasileiro de 2006, abriu mais 3 bancas de jornal na Zona Oeste de São Paulo.[/justificado]',
'2007-06-02','V');
insert into tbl_artigos(titulo,conteudo,dtCriacao,estado)values(
'Bugsbunny na grande São Paulo','[justificado]Em 2012 nossa empresa alcançou a marca de 32 bancas de jornal, arrecadando R$ 1.000.00,00 por ano. O abrangente portfólio da empresa inclui mais de 1.000 revistas e jornais nacionais e internacionais, graças a preferencia das empresas por distribuidoras licenciadas.[/justificado][justificado]Hoje a empresa possui o Prêmio MPE Brasil, ganho pela excelência na gestão e logística da nossa empresa.[/justificado]',
'2007-06-20','V');

insert into tbl_autores_artigos(idArtigo,idAutor,dtEmissao)values(
1,1,'2016-06-20 19:30:00');

insert into tbl_autores_artigos(idArtigo,idAutor,dtEmissao)values(
2,1,'2016-06-20 19:30:00');

insert into tbl_autores(nome,email,sexo)values("João Paulo","joao.office@gmail.com","M");

insert into tbl_autores_entrevistas(idEntrevista,idAutor,dtEmissao)values(
1,2,'2007-06-02 19:30:00');

/*## Area do Artigos -_- Autores  ##*/
/* Visualiza os titulo dos artigos e seus autores com a data de registo e a de criacao*/
select a.titulo as artigo, au.nome as autor, aa.dtEmissao as dtRegisto, a.dtCriacao as Escrito from tbl_artigos as a, tbl_autores_artigos as aa, tbl_autores as au
where aa.idArtigo=a.id and aa.idAutor = au.id;

select * from tbl_artigos where estado = 'V' order by dtCriacao asc;

insert into tbl_autores(nome,email,sexo)values("Douglas da Silva Oliveira","douglas@live.com","M");
insert into tbl_autores(nome,email,sexo)values("Mayra da Silva","mayra@hotmail.com","F");

insert into tbl_noticia_categorias(nome)values("Ciência");
insert into tbl_noticia_categorias(nome)values("Política");
insert into tbl_noticia_categorias(nome)values("Economia");
insert into tbl_noticia_categorias(nome)values("Segurança");

insert into tbl_noticias(idCategoria,titulo,conteudo,estado,dtCriacao)values(1,"Asteroide maior do que Grande Pirâmide egípcia está se aproximando da Terra",
'[justificado]Um enorme asteroide passará perto da Terra em 29 de agosto a uma velocidade de nove quilômetros por segundo, informou o Laboratório de Propulsão a Jato da NASA.[/justificado][justificado]O corpo celeste, denominado 2016 NF23, é considerado pela agência espacial como "potencialmente perigoso" devido a seu tamanho: seu diâmetro pode atingir entre 70 e 160 metros. O tamanho do asteroide pode ser comparado, dependendo de suas dimensões definitivas, com um avião Boeing 747 ou com a Grande Pirâmide de Giza (139 metros de altura).[/justificado][justificado]A agência estima que o asteroide passará a 4,8 milhões de quilômetros da Terra o que equivale a três vezes a distância entre a Terra e a Lua, segundo o Fox News.[/justificado][justificado]Segundo a classificação da NASA, qualquer corpo celeste que passe a uma distância menor que 7,5 milhões de quilômetros da Terra e tenha um diâmetro superior a 140 metros está na lista de corpos perigosos.[/justificado][justificado]O asteroide deverá passar pelo nosso planeta por volta da meia-noite, horário GMT, na próxima quarta-feira (29) (21h00, horário de Brasília).[/justificado]',
'V',"2000-08-08");


insert into tbl_noticias(idCategoria,titulo,conteudo,estado,dtCriacao)values(1,"Motores da epidemia de obesidade no Brasil",
'[justificado]Se o ritmo atual de crescimento da obesidade no Brasil for mantido, o país poderá apresentar em 2020 uma tendência de prevalência semelhante à dos Estados Unidos e do México, com excesso de peso em 35% da população.[/justificado]
[justificado]A avaliação foi feita por pesquisadores participantes do evento com o tema “Obesidade” no Ciclo de Palestras ILP-FAPESP, realizado no dia 20 de agosto na Assembleia Legislativa do Estado de São Paulo (Alesp).[/justificado]
[justificado]A prevalência de obesidade no Brasil se intensificou a partir dos anos 2000 e mudanças no padrão alimentar da população contribuem para a escalada do problema. Nas últimas décadas, o brasileiro passou a substituir alimentos tradicionais, como arroz, feijão e salada, por preparações multiprocessadas.[/justificado]
[justificado]“Houve uma intensificação de um ambiente alimentar obesogênico [que causa obesidade] que influenciou o estilo de vida e contribuiu para o aumento do problema no país”, disse Patricia Constante Jaime, professora do Departamento de Nutrição da Faculdade de Saúde Pública da Universidade de São Paulo (FSP-USP).[/justificado]
[justificado]De acordo com a mais recente Pesquisa Nacional de Saúde publicada pelo Instituto Brasileiro de Geografia e Estatística (IBGE), 20,8% da população adulta brasileira – 26 milhões de pessoas – está obesa. A prevalência desse problema de saúde tem sido registrada em todas as faixas etárias e níveis de renda e em maior proporção em mulheres do que homens.[/justificado]',
'V',"2000-08-08");

insert into tbl_autores_noticias(idNoticia,idAutor,dtEmissao)values(1,2,'2000-08-08 19:30:00');
insert into tbl_autores_noticias(idNoticia,idAutor,dtEmissao)values(2,2,'2000-08-08 19:30:00');

/*select n.titulo,n.conteudo,nc.nome as categoria from tbl_noticias as n,tbl_autores_noticias as an, tbl_noticia_categorias as nc where estado='V' and an.idNoticia=n.id and nc.id = n.idCategoria order by an.dtEmissao asc*/




/*select n.titulo,n.conteudo,nc.nome as categoria from tbl_noticias as n,tbl_autores_noticias as an, tbl_noticia_categorias as nc
where estado='V' and an.idNoticia=n.id and nc.id = n.idCategoria order by an.dtEmissao asc;*/

/*## Area do Noticias -_- Autores  ##*/
/* Visualiza as noticias e seus autores */
/*select n.titulo as noticia, a.nome as autor from tbl_noticias as n,tbl_autores as a, tbl_autores_noticias as an
where an.idNoticia = n.id and an.idAutor = a.id;*/
/* Visualiza as noticias e autores e a categoria */
/*select n.titulo as noticia,a.nome as nome, nc.nome as categoria from tbl_noticias as n, tbl_noticia_categorias as nc,tbl_autores as a,tbl_autores_noticias as an
where an.idNoticia= n.id and an.idAutor= a.id and n.idCategoria= nc.id;

select * from tbl_noticias;

select*from tbl_autores;

*/

/* Inserindo os estilos de usuarios do sistema  */
insert into tbl_usuario_cargos(nome)values('Administrador');
insert into tbl_usuario_cargos(nome)values('Cataloguista');
insert into tbl_usuario_cargos(nome)values('Operador');
/* Inserindo os estados que um usuario pode possuir */
insert into tbl_usuario_estados(nome)values('suspenso');
insert into tbl_usuario_estados(nome)values('desativado');
insert into tbl_usuario_estados(nome)values('ativo');
/* Inserindo  um usuario */
insert into tbl_usuarios(nome,email,senha,dataEmissao,telefone)values(
'admin','root@bugbunny.com',
'$2y$12$EzPo.rP8YafMdXUOjAbW/eyV7ebhiIZX91D8.Ba4l/4lUz.guazIy',/*12345*/
'2018-09-25','(11)4826-5847');

insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values(
1,3,'2018-09-27 00:00:00');

insert into tbl_cargos_usuarios(idUsuario,idCargo,dataEmissao)values(
1,1,'2018-09-27 00:00:00');

insert into tbl_usuarios(nome,email,senha,dataEmissao,telefone)values(
'administrador','admin@bugbunny.com',
'$2y$12$EzPo.rP8YafMdXUOjAbW/eyV7ebhiIZX91D8.Ba4l/4lUz.guazIy',/*12345*/
'2018-09-27','(11)4826-5847');

insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values(
2,3,'2018-09-25 00:00:00');

insert into tbl_cargos_usuarios(idUsuario,idCargo,dataEmissao)values(
2,1,'2018-09-25 00:00:00');


select * from tbl_usuarios;

/*## Area do Usuario -_- Estados  ##*/
/* Visualiza os estados em que cada usuario ja esteve */
select u.nome as nome, ue.nome as estado, eu.dataEmissao as desde from tbl_usuarios as u, tbl_estados_usuarios  as eu,tbl_usuario_estados as ue where eu.idUsuario= u.id and eu.idEstado=ue.id;

/* Visualiza o estado atual de cada usuario  o nome e a data de emissao */
select u.nome as nome, ue.nome as estado, eu.dataEmissao as desde from tbl_usuarios as u, tbl_estados_usuarios  as eu,tbl_usuario_estados as ue where
eu.idUsuario= u.id and eu.idEstado=ue.id
and eu.dataEmissao=(select max(tbl_estados_usuarios.dataEmissao) from tbl_estados_usuarios where tbl_estados_usuarios.idUsuario=u.id);

/*## Area do Usuario -_- cargo  ##*/
/* Visualiza os cargos em que cada usuario ja esteve */
select u.nome as nome, uc.nome as cargos, cu.dataEmissao as desde from tbl_usuarios as u, tbl_cargos_usuarios  as cu,tbl_usuario_cargos as uc where cu.idUsuario= u.id and cu.idCargo=uc.id;

/* Visualiza o cargo atual de cada usuario */
select u.nome as nome, uc.nome as cargos, cu.dataEmissao as desde from tbl_usuarios as u, tbl_cargos_usuarios  as cu,tbl_usuario_cargos as uc where
cu.idUsuario= u.id and cu.idCargo=uc.id
and cu.dataEmissao=(select max(tbl_cargos_usuarios.dataEmissao) from tbl_cargos_usuarios where tbl_cargos_usuarios.idUsuario=u.id);




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
insert into tbl_profissao(profissao)values('Acrilista');
insert into tbl_profissao(profissao)values('Adestrador');
insert into tbl_profissao(profissao)values('Administrador');
insert into tbl_profissao(profissao)values('Agente');
insert into tbl_profissao(profissao)values('Analista Tributário');
insert into tbl_profissao(profissao)values('Antropólogo');
insert into tbl_profissao(profissao)values('Aquarista');
insert into tbl_profissao(profissao)values('Arqueólogo');
insert into tbl_profissao(profissao)values('Arquivista');
insert into tbl_profissao(profissao)values('Artista');/*kkkkkkk*/
insert into tbl_profissao(profissao)values('Ascensorista');
insert into tbl_profissao(profissao)values('Assessor');
insert into tbl_profissao(profissao)values('Ator');
insert into tbl_profissao(profissao)values('Avaliador');
insert into tbl_profissao(profissao)values('Azulejista');
insert into tbl_profissao(profissao)values('Caixa');
insert into tbl_profissao(profissao)values('Camareiro');
insert into tbl_profissao(profissao)values('Carpinteiro');
insert into tbl_profissao(profissao)values('Carteiro');
insert into tbl_profissao(profissao)values('Chaveiro');
insert into tbl_profissao(profissao)values('Comissário');
insert into tbl_profissao(profissao)values('Comprador');
insert into tbl_profissao(profissao)values('Confeiteiro');
insert into tbl_profissao(profissao)values('Consultor');
insert into tbl_profissao(profissao)values('Contador');
insert into tbl_profissao(profissao)values('Controlador');
insert into tbl_profissao(profissao)values('Coordenador');
insert into tbl_profissao(profissao)values('Cozinheiro');
insert into tbl_profissao(profissao)values('Costureiro');
insert into tbl_profissao(profissao)values('Cuidador');
insert into tbl_profissao(profissao)values('Curador');
insert into tbl_profissao(profissao)values('Dançarino');
insert into tbl_profissao(profissao)values('Decorador');
insert into tbl_profissao(profissao)values('Divulgador');
insert into tbl_profissao(profissao)values('Economista');
insert into tbl_profissao(profissao)values('Eletricista');
insert into tbl_profissao(profissao)values('Embalador');
insert into tbl_profissao(profissao)values('Encanador');
insert into tbl_profissao(profissao)values('Empacotador');
insert into tbl_profissao(profissao)values('Ciêntista');
insert into tbl_profissao(profissao)values('Entregador');
insert into tbl_profissao(profissao)values('Estatístico');
insert into tbl_profissao(profissao)values('Etiquetador');
insert into tbl_profissao(profissao)values('Farmacêutico');
insert into tbl_profissao(profissao)values('Ferramenteiro');
insert into tbl_profissao(profissao)values('Ferreiro');
insert into tbl_profissao(profissao)values('Fiscal');
insert into tbl_profissao(profissao)values('Fisioterapeuta');
insert into tbl_profissao(profissao)values('Florista');
insert into tbl_profissao(profissao)values('Fotógrafo');
insert into tbl_profissao(profissao)values('Funileiro');
insert into tbl_profissao(profissao)values('Fresador');
insert into tbl_profissao(profissao)values('Fundidor de Metais');
insert into tbl_profissao(profissao)values('Gastrônomo');
insert into tbl_profissao(profissao)values('Astronomo');
insert into tbl_profissao(profissao)values('Governanta');
insert into tbl_profissao(profissao)values('Gesseiro');
insert into tbl_profissao(profissao)values('Impressor');
insert into tbl_profissao(profissao)values('Ilustrador');
insert into tbl_profissao(profissao)values('Inspetor');
insert into tbl_profissao(profissao)values('Segurança');
insert into tbl_profissao(profissao)values('Instrumentista');
insert into tbl_profissao(profissao)values('Intérprete');
insert into tbl_profissao(profissao)values('Instalador');
insert into tbl_profissao(profissao)values('Lavador');
insert into tbl_profissao(profissao)values('Limpador');
insert into tbl_profissao(profissao)values('Manicure');
insert into tbl_profissao(profissao)values('Maquiador');
insert into tbl_profissao(profissao)values('Marceneiro');
insert into tbl_profissao(profissao)values('Mecânico');
insert into tbl_profissao(profissao)values('Matematico');
insert into tbl_profissao(profissao)values('Montador');
insert into tbl_profissao(profissao)values('Motoboy');
insert into tbl_profissao(profissao)values('Soldado');
insert into tbl_profissao(profissao)values('Padeiro');
insert into tbl_profissao(profissao)values('Pedreiro');
insert into tbl_profissao(profissao)values('Pintor');
insert into tbl_profissao(profissao)values('Repórter');
insert into tbl_profissao(profissao)values('Webmaster');





/*
select * from tbl_profissao;
*/
INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'João Paulo','(11)4368-8975','(11)97589-6587','joaopaulo19@mail.com','webtmpXP2.net','facebook.com/joaopaulo19','Acresentar a Revista SOAP','Revistas','M','19','2018-09-04 10:10:01');

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(1,'Gilberto Ramos','(11)4587-8541','(11)98578-5764','gilbert.tec@vivaldi.net','','facebook.com/gilberto.tec','Adicionar Jornal New York Times','Jornal','M','43','2018-09-04 14:36:18');

INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES
(4,'Elizabeth Alves de Moraes','(11)4588-8541','(11)98298-5617','elizabeth58@reno.com','','en.facebook.com/elizabeth58','Adicionar Jornal New York Times','Jornal','M','43','2018-09-03 10:10:18');

/*
select * from tbl_tickets;

select t.*, p.profissao, tt.tipo from tbl_tickets as t, tbl_profissao as p, tbl_tipos_tickets as tt where t.idProfissao=p.id and t.idTipo=tt.id;
*/

insert into tbl_donos(nome,telefone,email)values('Gilberto Ramos','(11)4303-6947','gilberto.tec@vivaldi.net');
insert into tbl_donos(nome,telefone,email)values('Daffy Duck','(11)4868-8961','daffy_duck@bugbunny.net');
insert into tbl_donos(nome,telefone,email)values('João faret','(11)4988-4308','joao.off@gmail.com');

/*
select * from tbl_donos;
*/
insert into tbl_bancas(nome,uf,cidade,
bairro,logradouro,descrisao,
horario,location,telefone,idDono
)values(
'BugBunny Official ','SP','Osasco',
'Aliança','Av. Brasil n°187',
'[titulo]BugBunny[/titulo][justificado]Nossa banca contém todas as opções para o leitor moderno.[/justificado][justificado]Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: "" De Finibus Bonorum e malorum "" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética.
Parece que apenas alguns trechos do texto original aparecem no Lipsum comumente usado, e que uma série de cartas tenham sido removido ou adicionado em diversos pontos do texto ao longo do tempo. É por isso que existem hoje em dia um número de texto Lorem Ipsum mais ou menos diferentes uns dos outros. Devido à sua data de produção, uso Lorem ipsum não está mais sujeito a direitos de autor e evita quaisquer questões de direitos autorais. [/justificado]',
'8:30 ate 18:00',
'-23.510439, -46.777768','(11)4579-6584',
2);

insert into tbl_bancas(nome,uf,cidade,
bairro,logradouro,descrisao,
horario,location,telefone,idDono
)values(
' Santa Fé ','SP','Osasco',
'Quitaúna','Av. Carlos de Oliveira Silva n°21',
'[titulo]Santa Fé[/titulo][center]A banca fica localizada no centro do parque, temos de jornais ate revistas de mangas[/center]',
'8:30 ate 18:00',
'-23.527556, -46.814482','(11)4874-2014',
1);

insert into tbl_bancas(nome,uf,cidade,
bairro,logradouro,descrisao,
horario,location,telefone,idDono
)values(
' Olimpica ','SP','Osasco',
'Centro','Av. Dos Autonomistas n°28',
'[titulo]Olimpia[/titulo][center]Visite a nossa amada banca, temos Chaveiros e lembrancinhas[/center]',
'8:30 ate 18:00',
'-23.526454, -46.798282','(11)4899-3000',
3);

insert into tbl_bancas(nome,uf,cidade,
bairro,logradouro,descrisao,
horario,location,telefone,idDono
)values(
'Banca das Flores ','SP','Osasco',
'Cidade das Flores','Av. PAU-BRASIL',
'[titulo]Banca das Flores[/titulo][center]Visite a nossa amada banca, Estamos no centro da praça[/center]',
'8:30 ate 18:00',
'-23.536222, -46.808528','(11)4958-4957',
3);
/*
select * from tbl_bancas;
*/