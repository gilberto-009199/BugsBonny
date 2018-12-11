-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: bugbunny
-- ------------------------------------------------------
-- Server version	5.6.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_artigos`
--

DROP TABLE IF EXISTS `tbl_artigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) NOT NULL,
  `conteudo` text NOT NULL,
  `dtCriacao` date NOT NULL,
  `estado` enum('V','F') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_artigos`
--

LOCK TABLES `tbl_artigos` WRITE;
/*!40000 ALTER TABLE `tbl_artigos` DISABLE KEYS */;
INSERT INTO `tbl_artigos` VALUES (1,'Fundação da Bugsbunny 2006','[justificado]A origem da nossa empresa vem de um banca de jornal criada em 1990, nessa época a empresa era dirigida somente pelo nosso amado Daffy Duck, fundador e dono da empresa.[/justificado][justificado]Depois da morte da sua esposa e filhos se dedicou as empresas de sua região, fornecendo aos administradores assinaturas de revistas e jornais para seus empregados. Com crescimento brasileiro de 2006, abriu mais 3 bancas de jornal na Zona Oeste de São Paulo.[/justificado]','2007-06-02','V'),(2,'Bugsbunny na grande São Paulo','[justificado]Em 2012 nossa empresa alcançou a marca de 32 bancas de jornal, arrecadando R$ 1.000.00,00 por ano. O abrangente portfólio da empresa inclui mais de 1.000 revistas e jornais nacionais e internacionais, graças a preferencia das empresas por distribuidoras licenciadas.[/justificado][justificado]Hoje a empresa possui o Prêmio MPE Brasil, ganho pela excelência na gestão e logística da nossa empresa.[/justificado]','2007-06-20','V'),(3,'sadsa','asdasdaddasdas','2018-11-06','V'),(4,'sdasdasd','sadasddadd sd','2018-11-06','V'),(6,'sdfsdfsdfsdfsdfsdf','sdfsdfsdfsdfsdfsdfsdf','2018-11-06','V'),(8,'alguma coisa 666','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\n','2018-11-08','V');
/*!40000 ALTER TABLE `tbl_artigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_autores`
--

DROP TABLE IF EXISTS `tbl_autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `sexo` enum('M','F') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_autores`
--

LOCK TABLES `tbl_autores` WRITE;
/*!40000 ALTER TABLE `tbl_autores` DISABLE KEYS */;
INSERT INTO `tbl_autores` VALUES (1,'Cristiane Rocha','cris.rocha@mail.com','F'),(2,'João Paulo','joao.office@gmail.com','M'),(3,'Douglas da Silva Oliveira','douglas@live.com','M'),(4,'Mayra da Silva','mayra@hotmail.com','F');
/*!40000 ALTER TABLE `tbl_autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_autores_artigos`
--

DROP TABLE IF EXISTS `tbl_autores_artigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_autores_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idArtigo` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `dtEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idArtigo` (`idArtigo`),
  KEY `idAutor` (`idAutor`),
  CONSTRAINT `tbl_autores_artigos_ibfk_1` FOREIGN KEY (`idArtigo`) REFERENCES `tbl_artigos` (`id`),
  CONSTRAINT `tbl_autores_artigos_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `tbl_autores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_autores_artigos`
--

LOCK TABLES `tbl_autores_artigos` WRITE;
/*!40000 ALTER TABLE `tbl_autores_artigos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_autores_artigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_autores_entrevistas`
--

DROP TABLE IF EXISTS `tbl_autores_entrevistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_autores_entrevistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntrevista` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `dtEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntrevista` (`idEntrevista`),
  KEY `idAutor` (`idAutor`),
  CONSTRAINT `tbl_autores_entrevistas_ibfk_1` FOREIGN KEY (`idEntrevista`) REFERENCES `tbl_entrevistas` (`id`),
  CONSTRAINT `tbl_autores_entrevistas_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `tbl_autores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_autores_entrevistas`
--

LOCK TABLES `tbl_autores_entrevistas` WRITE;
/*!40000 ALTER TABLE `tbl_autores_entrevistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_autores_entrevistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_autores_noticias`
--

DROP TABLE IF EXISTS `tbl_autores_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_autores_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNoticia` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `dtEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNoticia` (`idNoticia`),
  KEY `idAutor` (`idAutor`),
  CONSTRAINT `tbl_autores_noticias_ibfk_1` FOREIGN KEY (`idNoticia`) REFERENCES `tbl_noticias` (`id`),
  CONSTRAINT `tbl_autores_noticias_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `tbl_autores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_autores_noticias`
--

LOCK TABLES `tbl_autores_noticias` WRITE;
/*!40000 ALTER TABLE `tbl_autores_noticias` DISABLE KEYS */;
INSERT INTO `tbl_autores_noticias` VALUES (1,1,2,'2000-08-08 19:30:00'),(2,2,2,'2000-08-08 19:30:00');
/*!40000 ALTER TABLE `tbl_autores_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bancas`
--

DROP TABLE IF EXISTS `tbl_bancas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bancas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `descrisao` varchar(1024) NOT NULL,
  `horario` varchar(40) NOT NULL,
  `location` varchar(24) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `idDono` int(11) NOT NULL,
  `estado` enum('V','F') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDono` (`idDono`),
  CONSTRAINT `tbl_bancas_ibfk_1` FOREIGN KEY (`idDono`) REFERENCES `tbl_donos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bancas`
--

LOCK TABLES `tbl_bancas` WRITE;
/*!40000 ALTER TABLE `tbl_bancas` DISABLE KEYS */;
INSERT INTO `tbl_bancas` VALUES (1,'BugBunny teste','SP','Osasco','Aliança','Av. Brasil n°187','[titulo]BugBunny[/titulo][justificado]Nossa banca contém todas as opções para o leitor moderno.[/justificado][justificado]Lorem Ipsum tem sido o padrão desde a Idade Média. Um pintor teria peças mistas de texto em um livro exemplar e é este texto que nós usamos hoje. Outra versão diz que este é um trecho do livro de Cícero: \"\" De Finibus Bonorum e malorum \"\" seções 1.10.32 / 1.10.33. Este livro, muito popular durante a Renascença, é um tratado sobre a teoria da ética.\nParece que apenas alguns trechos do texto original aparecem no Lipsum comumente usado, e que uma série de cartas tenham sido removido ou adicionado em diversos pontos do texto ao longo do tempo. É por isso que existem hoje em dia um número de texto Lorem Ipsum mais ou menos diferentes uns dos outros. Devido à sua data de produção, uso Lorem ipsum não está mais sujeito a direitos de autor e evita quaisquer questões de direitos autorais. [/justificado]','8:30 ate 18:00','-23.510439, -46.777768','(11)4579-6584',2,'V'),(3,' Olimpica ','SP','Osasco','Centro','Av. Dos Autonomistas n°28','[titulo]Olimpia[/titulo][center]Visite a nossa amada banca, temos Chaveiros e lembrancinhas[/center]','8:30 ate 18:00','-23.526454, -46.798282','(11)4899-3000',3,'V'),(4,'Banca das Flores ','SP','Osasco','Cidade das Flores','Av. PAU-BRASIL','[titulo]Banca das Flores[/titulo][center]Visite a nossa amada banca, Estamos no centro da praça[/center]','8:30 ate 18:00','-23.536222, -46.808528','(11)4958-4957',3,'V'),(5,'Olimpica','SP','asdasd','asdas','sadas','[titulo]Olimpica[/titulo]\n[justificado]asdasdasdasdad[/justificado]','09:00 ate 8:00','-23.540454, -46.821241','(11)4758-5875',2,'V'),(7,'Eldorado','SP','Barueri','Jd. Silveira','rua José Ilheus, n°32','[titulo]asdasdas[/titulo]','09:00 ate 18:00','-23.528222, -46.889561','(11)4587-5478',2,'V'),(8,'alguma banca','SP','Osasco','teste','Rua Maria Jesus do Rosário','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\n','05:00 17:00','-23.53453, -46.78974','123121123',1,'V');
/*!40000 ALTER TABLE `tbl_bancas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cargos_usuarios`
--

DROP TABLE IF EXISTS `tbl_cargos_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cargos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `dataEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idCargo` (`idCargo`),
  CONSTRAINT `tbl_cargos_usuarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuarios` (`id`),
  CONSTRAINT `tbl_cargos_usuarios_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `tbl_usuario_cargos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cargos_usuarios`
--

LOCK TABLES `tbl_cargos_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_cargos_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_cargos_usuarios` VALUES (1,1,1,'2018-09-27 00:00:00'),(2,2,1,'2018-09-25 00:00:00'),(4,4,4,'2018-11-08 13:41:32'),(5,4,4,'2018-11-08 13:42:10');
/*!40000 ALTER TABLE `tbl_cargos_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `herda` int(11) DEFAULT NULL,
  `estado` enum('V','F') DEFAULT 'V',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_categoria_tbl_categoria_idx` (`herda`),
  CONSTRAINT `fk_tbl_categoria_tbl_categoria` FOREIGN KEY (`herda`) REFERENCES `tbl_categoria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_donos`
--

DROP TABLE IF EXISTS `tbl_donos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_donos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_donos`
--

LOCK TABLES `tbl_donos` WRITE;
/*!40000 ALTER TABLE `tbl_donos` DISABLE KEYS */;
INSERT INTO `tbl_donos` VALUES (1,'Gilberto Ramos','(11)4303-6947','gilberto.tec@vivaldi.net'),(2,'Daffy Duck','(11)4868-8961','daffy_duck@bugbunny.net'),(3,'João faret','(11)4988-4308','joao.off@gmail.com');
/*!40000 ALTER TABLE `tbl_donos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_entrevistas`
--

DROP TABLE IF EXISTS `tbl_entrevistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_entrevistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) NOT NULL,
  `conteudo` text NOT NULL,
  `celebridade` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `dtCriacao` date NOT NULL,
  `img` varchar(80) DEFAULT NULL,
  `estado` enum('V','F') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_entrevistas`
--

LOCK TABLES `tbl_entrevistas` WRITE;
/*!40000 ALTER TABLE `tbl_entrevistas` DISABLE KEYS */;
INSERT INTO `tbl_entrevistas` VALUES (3,'Eu','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\n','alguem','https://www.uol.com.br/','2018-11-08','d53b7ab6e2e9851b7689c6c5152912dc.jpg','V');
/*!40000 ALTER TABLE `tbl_entrevistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados_usuarios`
--

DROP TABLE IF EXISTS `tbl_estados_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estados_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `dataEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idEstado` (`idEstado`),
  CONSTRAINT `tbl_estados_usuarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuarios` (`id`),
  CONSTRAINT `tbl_estados_usuarios_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `tbl_usuario_estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados_usuarios`
--

LOCK TABLES `tbl_estados_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_estados_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_estados_usuarios` VALUES (1,1,3,'2018-09-27 00:00:00'),(2,2,3,'2018-09-25 00:00:00'),(4,2,2,'2018-11-08 13:23:14'),(5,2,3,'2018-11-08 13:23:15'),(6,4,3,'2018-11-08 13:41:32'),(8,4,3,'2018-11-08 13:42:10'),(9,1,2,'2018-12-11 13:05:29'),(10,1,2,'2018-12-11 13:05:57'),(11,1,3,'2018-12-11 13:05:57');
/*!40000 ALTER TABLE `tbl_estados_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_logs`
--

DROP TABLE IF EXISTS `tbl_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(64) NOT NULL,
  `idToken` int(11) NOT NULL,
  `dtEmissao` datetime NOT NULL,
  `ip` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idToken` (`idToken`),
  CONSTRAINT `tbl_logs_ibfk_1` FOREIGN KEY (`idToken`) REFERENCES `tbl_token` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_logs`
--

LOCK TABLES `tbl_logs` WRITE;
/*!40000 ALTER TABLE `tbl_logs` DISABLE KEYS */;
INSERT INTO `tbl_logs` VALUES (1,'delete from tbl_tickets where id =2',4,'2018-11-08 13:21:06','::1'),(2,' Editando nivel ID>NOME : 3,OperadorXI',4,'2018-11-08 13:21:42','::1'),(3,'Criando usuario: MARCEL2,marcel@gmail.com',4,'2018-11-08 13:22:35','::1'),(4,'Criando user > estado: MARCEL2,3 ',4,'2018-11-08 13:22:35','::1'),(5,'Criando user > cargo: MARCEL2,1',4,'2018-11-08 13:22:35','::1'),(8,' Criando nivel de usuario : teste do marcel',6,'2018-11-08 13:39:44','10.93.0.3'),(9,' Editando nivel ID>NOME : 4,teste do marcel 666',6,'2018-11-08 13:40:12','10.93.0.3'),(10,'Criando usuario: Marcel,marcel@teste.com',6,'2018-11-08 13:41:32','10.93.0.3'),(11,'Criando user > estado: Marcel,3 ',6,'2018-11-08 13:41:33','10.93.0.3'),(12,'Criando user > cargo: Marcel,4',6,'2018-11-08 13:41:33','10.93.0.3'),(13,'Alterando user > estado  : 3, 2',6,'2018-11-08 13:41:46','10.93.0.3'),(14,'Alterando user : marcel NT, 4',6,'2018-11-08 13:42:10','10.93.0.3'),(15,'Alterando user > cargo : marcel NT, 4',6,'2018-11-08 13:42:10','10.93.0.3'),(16,'Alterando user > estado  : marcel NT, 3',6,'2018-11-08 13:42:10','10.93.0.3'),(17,'delete from tbl_tickets where id =4',7,'2018-11-08 13:45:23','10.93.0.3'),(18,'Alterando user > estado  : 1, 2',9,'2018-12-11 13:05:29','::1'),(19,'Alterando user > estado  : 1, 2',9,'2018-12-11 13:05:57','::1'),(20,'Alterando user > estado  : 1, 3',9,'2018-12-11 13:05:57','::1');
/*!40000 ALTER TABLE `tbl_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_noticia_categorias`
--

DROP TABLE IF EXISTS `tbl_noticia_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_noticia_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_noticia_categorias`
--

LOCK TABLES `tbl_noticia_categorias` WRITE;
/*!40000 ALTER TABLE `tbl_noticia_categorias` DISABLE KEYS */;
INSERT INTO `tbl_noticia_categorias` VALUES (1,'Ciência'),(3,'Economia'),(2,'Política'),(4,'Segurança');
/*!40000 ALTER TABLE `tbl_noticia_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_noticias`
--

DROP TABLE IF EXISTS `tbl_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `conteudo` text NOT NULL,
  `dtCriacao` date NOT NULL,
  `estado` enum('V','F') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `tbl_noticias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_noticia_categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_noticias`
--

LOCK TABLES `tbl_noticias` WRITE;
/*!40000 ALTER TABLE `tbl_noticias` DISABLE KEYS */;
INSERT INTO `tbl_noticias` VALUES (1,1,'Asteroide maior do que Grande Pirâmide egípcia está se aproximando da Terra','[justificado]Um enorme asteroide passará perto da Terra em 29 de agosto a uma velocidade de nove quilômetros por segundo, informou o Laboratório de Propulsão a Jato da NASA.[/justificado][justificado]O corpo celeste, denominado 2016 NF23, é considerado pela agência espacial como \"potencialmente perigoso\" devido a seu tamanho: seu diâmetro pode atingir entre 70 e 160 metros. O tamanho do asteroide pode ser comparado, dependendo de suas dimensões definitivas, com um avião Boeing 747 ou com a Grande Pirâmide de Giza (139 metros de altura).[/justificado][justificado]A agência estima que o asteroide passará a 4,8 milhões de quilômetros da Terra o que equivale a três vezes a distância entre a Terra e a Lua, segundo o Fox News.[/justificado][justificado]Segundo a classificação da NASA, qualquer corpo celeste que passe a uma distância menor que 7,5 milhões de quilômetros da Terra e tenha um diâmetro superior a 140 metros está na lista de corpos perigosos.[/justificado][justificado]O asteroide deverá passar pelo nosso planeta por volta da meia-noite, horário GMT, na próxima quarta-feira (29) (21h00, horário de Brasília).[/justificado]','2000-08-08','V'),(2,1,'Motores da epidemia de obesidade no Brasil','[justificado]Se o ritmo atual de crescimento da obesidade no Brasil for mantido, o país poderá apresentar em 2020 uma tendência de prevalência semelhante à dos Estados Unidos e do México, com excesso de peso em 35% da população.[/justificado]\n[justificado]A avaliação foi feita por pesquisadores participantes do evento com o tema “Obesidade” no Ciclo de Palestras ILP-FAPESP, realizado no dia 20 de agosto na Assembleia Legislativa do Estado de São Paulo (Alesp).[/justificado]\n[justificado]A prevalência de obesidade no Brasil se intensificou a partir dos anos 2000 e mudanças no padrão alimentar da população contribuem para a escalada do problema. Nas últimas décadas, o brasileiro passou a substituir alimentos tradicionais, como arroz, feijão e salada, por preparações multiprocessadas.[/justificado]\n[justificado]“Houve uma intensificação de um ambiente alimentar obesogênico [que causa obesidade] que influenciou o estilo de vida e contribuiu para o aumento do problema no país”, disse Patricia Constante Jaime, professora do Departamento de Nutrição da Faculdade de Saúde Pública da Universidade de São Paulo (FSP-USP).[/justificado]\n[justificado]De acordo com a mais recente Pesquisa Nacional de Saúde publicada pelo Instituto Brasileiro de Geografia e Estatística (IBGE), 20,8% da população adulta brasileira – 26 milhões de pessoas – está obesa. A prevalência desse problema de saúde tem sido registrada em todas as faixas etárias e níveis de renda e em maior proporção em mulheres do que homens.[/justificado]','2000-08-08','V');
/*!40000 ALTER TABLE `tbl_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ofertas`
--

DROP TABLE IF EXISTS `tbl_ofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ofertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `descricao` varchar(32) NOT NULL,
  `vlAnterior` varchar(10) DEFAULT NULL,
  `vlPosterior` varchar(10) DEFAULT NULL,
  `img` varchar(128) DEFAULT NULL,
  `estado` enum('V','F') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ofertas`
--

LOCK TABLES `tbl_ofertas` WRITE;
/*!40000 ALTER TABLE `tbl_ofertas` DISABLE KEYS */;
INSERT INTO `tbl_ofertas` VALUES (7,'Cinza e Branco','Barato e rapido','12','25','538eecc1585137daece0c8e2c0e2c78b.jpg','V'),(8,'frança','dasdasdasdasd','10','7','7756232a104d6dc55c76c58f3c5af8ff.jpg','V'),(10,'teste 666','sdf sdf dsf dsf','10','10','479ba99713d2fa8df18cbf2ef363957b.jpg','V');
/*!40000 ALTER TABLE `tbl_ofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produtos`
--

DROP TABLE IF EXISTS `tbl_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `descrisao` varchar(45) DEFAULT NULL,
  `valor` decimal(11,2) NOT NULL,
  `img` varchar(128) NOT NULL,
  `estado` enum('V','F') NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_produtos_tbl_categoria_idx` (`idCategoria`),
  CONSTRAINT `fk_tbl_produtos_tbl_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produtos`
--

LOCK TABLES `tbl_produtos` WRITE;
/*!40000 ALTER TABLE `tbl_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profissao`
--

DROP TABLE IF EXISTS `tbl_profissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profissao` (`profissao`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profissao`
--

LOCK TABLES `tbl_profissao` WRITE;
/*!40000 ALTER TABLE `tbl_profissao` DISABLE KEYS */;
INSERT INTO `tbl_profissao` VALUES (5,'Açougueiro'),(70,'Acrilista'),(71,'Adestrador'),(72,'Administrador'),(6,'Advogado'),(73,'Agente'),(7,'Alfaiate'),(74,'Analista Tributário'),(75,'Antropólogo'),(8,'Aprendiz'),(22,'Apresentador'),(76,'Aquarista'),(77,'Arqueólogo'),(48,'Arquiteto'),(78,'Arquivista'),(49,'Artesão'),(79,'Artista'),(80,'Ascensorista'),(81,'Assessor'),(51,'Assistente'),(124,'Astronomo'),(9,'Atendente'),(82,'Ator'),(50,'Auditor'),(83,'Avaliador'),(84,'Azulejista'),(52,'Babá'),(53,'Back Office'),(54,'Balanceiro'),(55,'Balconista'),(56,'Bamburista'),(57,'Barista'),(58,'Barman'),(59,'Berçarista'),(60,'Bibliotecário'),(61,'Bilheteiro'),(62,'Biologista'),(63,'Biólogo'),(64,'Biomédico'),(65,'Bioquímico'),(66,'Biotecnólogo'),(67,'Blogueiro'),(68,'Bombeiro'),(69,'Borracheiro'),(1,'Cabeleireiro'),(85,'Caixa'),(86,'Camareiro'),(87,'Carpinteiro'),(88,'Carteiro'),(89,'Chaveiro'),(109,'Ciêntista'),(90,'Comissário'),(91,'Comprador'),(92,'Confeiteiro'),(93,'Consultor'),(94,'Contador'),(95,'Controlador'),(96,'Coordenador'),(98,'Costureiro'),(97,'Cozinheiro'),(99,'Cuidador'),(100,'Curador'),(101,'Dançarino'),(10,'DBA'),(102,'Decorador'),(11,'Dentista'),(12,'Desenhista'),(13,'Designer'),(28,'Diretor'),(103,'Divulgador'),(14,'Documentado'),(15,'Doméstica'),(104,'Economista'),(105,'Eletricista'),(106,'Embalador'),(108,'Empacotador'),(107,'Encanador'),(25,'Enfermeiro'),(21,'Engenheiro'),(110,'Entregador'),(111,'Estatístico'),(112,'Etiquetador'),(113,'Farmacêutico'),(114,'Ferramenteiro'),(115,'Ferreiro'),(116,'Fiscal'),(117,'Fisioterapeuta'),(118,'Florista'),(119,'Fotógrafo'),(121,'Fresador'),(122,'Fundidor de Metais'),(120,'Funileiro'),(30,'Garçom'),(123,'Gastrônomo'),(29,'Gerente'),(126,'Gesseiro'),(125,'Governanta'),(17,'Guarda'),(128,'Ilustrador'),(127,'Impressor'),(129,'Inspetor'),(133,'Instalador'),(131,'Instrumentista'),(132,'Intérprete'),(23,'Investigador'),(32,'Jardineiro'),(31,'Jornaleiro'),(20,'Jornalista'),(134,'Lavador'),(33,'letricista'),(135,'Limpador'),(136,'Manicure'),(137,'Maquiador'),(138,'Marceneiro'),(140,'Matematico'),(139,'Mecânico'),(26,'Medico'),(141,'Montador'),(142,'Motoboy'),(19,'Motorista'),(34,'Musico'),(35,'Nutricionista'),(4,'Outro'),(144,'Padeiro'),(145,'Pedreiro'),(146,'Pintor'),(24,'Policial'),(27,'Politico'),(16,'Professor'),(18,'Programador'),(36,'Psicólogo'),(37,'Publicitário'),(38,'Químico'),(39,'Radialista'),(147,'Repórter'),(40,'Salva Vidas'),(2,'Sapateiro'),(130,'Segurança'),(42,'Serralheiro'),(41,'Síndico'),(143,'Soldado'),(43,'Sorveteiro'),(45,'Tapeceiro'),(44,'Tecnico TI'),(3,'Vendedor'),(46,'Veterinário'),(148,'Webmaster'),(47,'Zelador');
/*!40000 ALTER TABLE `tbl_profissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tickets`
--

DROP TABLE IF EXISTS `tbl_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTipo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `celular` varchar(17) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(256) DEFAULT NULL,
  `facebook` varchar(126) NOT NULL,
  `critica` text NOT NULL,
  `infoPedido` varchar(128) DEFAULT NULL,
  `sexo` char(2) NOT NULL,
  `idProfissao` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTipo` (`idTipo`),
  KEY `idProfissao` (`idProfissao`),
  CONSTRAINT `tbl_tickets_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tbl_tipos_tickets` (`id`),
  CONSTRAINT `tbl_tickets_ibfk_2` FOREIGN KEY (`idProfissao`) REFERENCES `tbl_profissao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tickets`
--

LOCK TABLES `tbl_tickets` WRITE;
/*!40000 ALTER TABLE `tbl_tickets` DISABLE KEYS */;
INSERT INTO `tbl_tickets` VALUES (1,1,'João Paulo','(11)4368-8975','(11)97589-6587','joaopaulo19@mail.com','webtmpXP2.net','facebook.com/joaopaulo19','Acresentar a Revista SOAP','Revistas','M',19,'2018-09-04 10:10:01'),(3,4,'Elizabeth Alves de Moraes','(11)4588-8541','(11)98298-5617','elizabeth58@reno.com','','en.facebook.com/elizabeth58','Adicionar Jornal New York Times','Jornal','M',43,'2018-09-03 10:10:18');
/*!40000 ALTER TABLE `tbl_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipos_tickets`
--

DROP TABLE IF EXISTS `tbl_tipos_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipos_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipos_tickets`
--

LOCK TABLES `tbl_tipos_tickets` WRITE;
/*!40000 ALTER TABLE `tbl_tipos_tickets` DISABLE KEYS */;
INSERT INTO `tbl_tipos_tickets` VALUES (1,'Consulta'),(5,'Contactar ADM'),(4,'Pedido de Alteração'),(3,'Pedido de Atualização'),(6,'Promoções'),(7,'Recuperar Boleto/2°via'),(2,'Reportar Erro'),(8,'Reportar falha na Entrega');
/*!40000 ALTER TABLE `tbl_tipos_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_token`
--

DROP TABLE IF EXISTS `tbl_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dtEmissao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `tbl_token_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_token`
--

LOCK TABLES `tbl_token` WRITE;
/*!40000 ALTER TABLE `tbl_token` DISABLE KEYS */;
INSERT INTO `tbl_token` VALUES (1,'fe3351eaaeaf6997f465e923560594bb',2,'2018-11-06 12:00:13'),(2,'ed46d0afc2059d5d3aadc0c266c5bddc',2,'2018-11-08 10:40:34'),(3,'8bdf42c1125ebed20f2e02d491558468',2,'2018-11-08 13:16:25'),(4,'ddde1f138210d2e8bb9cf54acf685ad7',2,'2018-11-08 13:17:16'),(6,'dc54af9d3376a8afe2cdf7c2feb3edc1',2,'2018-11-08 13:39:19'),(7,'aa2b776860a1eb77b3fc31b0d28eda1c',4,'2018-11-08 13:42:44'),(8,'1aa796fb319fa1587e1944389561c150',2,'2018-11-22 10:40:43'),(9,'9473fb0f72a06b51883583f059e7d1f2',2,'2018-12-11 11:54:33');
/*!40000 ALTER TABLE `tbl_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_cargos`
--

DROP TABLE IF EXISTS `tbl_usuario_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario_cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_cargos`
--

LOCK TABLES `tbl_usuario_cargos` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_cargos` DISABLE KEYS */;
INSERT INTO `tbl_usuario_cargos` VALUES (1,'Administrador'),(2,'Cataloguista'),(3,'OperadorXI'),(4,'teste do marcel 666');
/*!40000 ALTER TABLE `tbl_usuario_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_estados`
--

DROP TABLE IF EXISTS `tbl_usuario_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_estados`
--

LOCK TABLES `tbl_usuario_estados` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_estados` DISABLE KEYS */;
INSERT INTO `tbl_usuario_estados` VALUES (1,'suspenso'),(2,'desativado'),(3,'ativo');
/*!40000 ALTER TABLE `tbl_usuario_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `dataEmissao` datetime NOT NULL,
  `telefone` varchar(18) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'admin','root@bugbunny.com','$2y$12$EzPo.rP8YafMdXUOjAbW/eyV7ebhiIZX91D8.Ba4l/4lUz.guazIy','2018-09-25 00:00:00','(11)4826-5847'),(2,'administrador','admin@bugbunny.com','$2y$12$EzPo.rP8YafMdXUOjAbW/eyV7ebhiIZX91D8.Ba4l/4lUz.guazIy','2018-09-27 00:00:00','(11)4826-5847'),(4,'marcel NT','marcel@teste.com','$2y$12$iRuLNhSpEIBEXyN0ofKtIeJhCgiSEWO7bbhsZXmMBFFpm.kw7Roii','2018-11-08 13:41:32','11111112');
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwusuarios`
--

DROP TABLE IF EXISTS `vwusuarios`;
/*!50001 DROP VIEW IF EXISTS `vwusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vwusuarios` AS SELECT 
 1 AS `id`,
 1 AS `nome`,
 1 AS `email`,
 1 AS `cargos`,
 1 AS `idCargo`,
 1 AS `idEstado`,
 1 AS `desde`,
 1 AS `estado`,
 1 AS `telefone`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vwusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vwusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwusuarios` AS select `u`.`id` AS `id`,`u`.`nome` AS `nome`,`u`.`email` AS `email`,`uc`.`nome` AS `cargos`,`cu`.`idCargo` AS `idCargo`,`eu`.`idEstado` AS `idEstado`,`cu`.`dataEmissao` AS `desde`,`ue`.`nome` AS `estado`,`u`.`telefone` AS `telefone` from ((((`tbl_usuarios` `u` join `tbl_cargos_usuarios` `cu`) join `tbl_usuario_cargos` `uc`) join `tbl_estados_usuarios` `eu`) join `tbl_usuario_estados` `ue`) where ((`cu`.`idUsuario` = `u`.`id`) and (`cu`.`idCargo` = `uc`.`id`) and (`cu`.`dataEmissao` = (select max(`tbl_cargos_usuarios`.`dataEmissao`) from `tbl_cargos_usuarios` where (`tbl_cargos_usuarios`.`idUsuario` = `u`.`id`))) and (`eu`.`idUsuario` = `u`.`id`) and (`eu`.`idEstado` = `ue`.`id`) and (`eu`.`dataEmissao` = (select max(`tbl_estados_usuarios`.`dataEmissao`) from `tbl_estados_usuarios` where (`tbl_estados_usuarios`.`idUsuario` = `u`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-11 10:58:38
