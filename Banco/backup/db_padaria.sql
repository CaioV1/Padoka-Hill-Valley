-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_padaria
-- ------------------------------------------------------
-- Server version	8.0.3-rc-log

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
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` VALUES (1,'Bebidas Quentes',1),(2,'Bebidas Geladas',1),(3,'Pães',1),(4,'Frios',1),(5,'Salgados',1),(6,'Doces',1);
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cidade`
--

DROP TABLE IF EXISTS `tbl_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `tbl_cidade_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cidade`
--

LOCK TABLES `tbl_cidade` WRITE;
/*!40000 ALTER TABLE `tbl_cidade` DISABLE KEYS */;
INSERT INTO `tbl_cidade` VALUES (3534401,'Osasco',35),(3550308,'São Paulo',35);
/*!40000 ALTER TABLE `tbl_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contato`
--

DROP TABLE IF EXISTS `tbl_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `info_produto` text,
  `sugestao_critica` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contato`
--

LOCK TABLES `tbl_contato` WRITE;
/*!40000 ALTER TABLE `tbl_contato` DISABLE KEYS */;
INSERT INTO `tbl_contato` VALUES (23,'Diego Augusto F. Silva','11 3333-3333','11 93434-4343','augusto_diego-18@hotmail.com','Empacotador','M','Teste','Teste'),(24,'Cacique Meira Oliveira','11 3275-5489','11 95432-6587','meira-cacique_meira@gmail.com','Programador','M','Teste 2','Teste 2'),(25,'Giovanna Morais da Silva','11 3746-5479','11 96543-6576','giovanna_tokyo-132@yahoo.com','Eletricista','F','Teste 3','Teste 3'),(34,'Teste AJAX II','11 3557-6768','11 95445-6757','teste_ajax_2@hotmail.com','Programador','F','Teste AJAX 2','Teste AJAX 2'),(35,'Teste AJAX III','11 3557-6768','11 95445-6757','teste_ajax_3@hotmail.com','Programador','F','Teste AJAX III','Teste AJAX III'),(36,'Teste AJAX IV','11 3557-6768','11 95445-6757','teste_ajax_4@hotmail.com','Programador','M','Teste AJAX IV','Teste AJAX IV'),(37,'Teste AJAX V','11 3557-6768','11 95445-6757','teste_pdo@hotmail.com','Programador','M','Teste AJAX V','Teste AJAX V'),(38,'Teste AJAX VI','11 3557-6768','11 95445-6757','teste_pdo@hotmail.com','Programador','M','Teste AJAX VI','Teste AJAX VI');
/*!40000 ALTER TABLE `tbl_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_conteudo`
--

DROP TABLE IF EXISTS `tbl_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `caminho_imagem` varchar(100) DEFAULT NULL,
  `texto` text,
  `situacao` tinyint(4) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pagina` (`id_pagina`),
  CONSTRAINT `tbl_conteudo_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `tbl_pagina` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_conteudo`
--

LOCK TABLES `tbl_conteudo` WRITE;
/*!40000 ALTER TABLE `tbl_conteudo` DISABLE KEYS */;
INSERT INTO `tbl_conteudo` VALUES (4,'Tecnologia','Imagens/imagens_conteudo/6be3d18f88d8bd0526ba50c1112dbd54.png','Esse ambiente foi criado para os amantes de tecnologia que adoram se reunir em nossa padaria para fazer pesquisas, jogar e até mesmo trabalhar, aqui o nosso cliente tem uma variedade de bebidas quentes e frias para ajudar na concentração das pessoas, muitas pessoas marcam encontros para desfrutar de nossas instalações, com Wi-Fi gratuito.',1,4),(5,'Leitura','Imagens/imagens_conteudo/1fd815a5940f5dab674e2027bc35f9ab.jpg','Aqui o nosso cliente pode desfrutar de um ambiente completo e totalmente temático para os amantes de leitura e que apreciam um ótimo café como parceiro de leitura',1,4),(6,'Rock','Imagens/imagens_conteudo/3f14ca08aa84f62be6372b059f60e24a.jpg','Aqui nossa padaria foi totalmente preparada para os amantes do bom e velho Rock and Roll, esse ambiente é composto por equipamentos, decorações e JulkBox que lembram os melhores anos do Rock and Roll (70, 80 e 90). Nosso cliente nesse ambiente tem os melhores “petiscos” para degustar e curtir nossa temática.',1,4),(7,'Fundação da Padoka Hill Valley','Imagens/imagens_conteudo/c1ec523cfe8d8cffbe409a6a79765e58.jpg','Em Maio de 1953 foi fundada a Padoka Hill Valley. Sr. Vicent Halen comprou a loja que hoje é a Matriz, localizada na avenida Luis Carlos Berrini, em São Paulo. Halen já havia sido carvoeiro, dono de bar e, na época, ninguém apostou que a nova empreitada daria tão certo. Veja só como a loja era diferente nos anos 50.',1,3),(8,'Fundador ','Imagens/imagens_conteudo/54fb1b733dbf48dd9601ba482fa58264.jpg','Desde o começo a Padoka Hill Valley possuía um serviço de entregas. Na época, era comum que as empresas comprassem muitos pães para servir no café da manhã dos seus trabalhadores. Primeiro Halen levava os pães em um triciclo, mas depois passou a entregar de carro.',1,3),(9,'Década de 70','Imagens/imagens_conteudo/ee7855e360f13d244744290dc05bb74e.jpg','Mesmo com a modernização e a tecnologia que surgiu ao longo dos anos, o pãozinho continuou sendo preparado com o mesmo carinho pela segunda geração da família. Aqui temos um registro da etapa de modelagem do pãozinho nos anos 1970.',1,3),(10,'Padoka Hill Valley Atualmente','Imagens/imagens_conteudo/d93842639a71985744f650a338ada9ae.jpg','A Padoka Hill Valley inicia um ousado plano de expansão com a inauguração de mais unidades na Grande São Paulo. Mas, mais do que expandir e modernizar fisicamente, ela implantará novos processos de gestão internos, transformando o tradicional negócio em uma rede. Hoje, a Padoka Hill Valley soma 3 unidades na Grande São Paulo, que passarão a usar, progressivamente, a nova identidade visual e padrão de serviços das novas lojas. Eles foram alinhados especialmente para rejuvenescer a marca.',1,3);
/*!40000 ALTER TABLE `tbl_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_destaque`
--

DROP TABLE IF EXISTS `tbl_destaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_destaque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_promo` text NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_destaque_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_destaque`
--

LOCK TABLES `tbl_destaque` WRITE;
/*!40000 ALTER TABLE `tbl_destaque` DISABLE KEYS */;
INSERT INTO `tbl_destaque` VALUES (1,'Teste Destaque',0,1),(3,'O pão de queijo, na realidade, não poderia ser considerado como tal. Está mais para um biscoito de polvilho modificado, que adquire textura macia pela adição do queijo meia cura ralado. Tudo indica que seja mais uma das adaptações estimuladas pela falta de ingredientes – foi somente no começo do século 20 que o trigo passou a ser cultivado em larga escala no Brasil. Antes, o jeito era quebrar o galho com os derivados da mandioca, herança indígena fácil de encontrar em qualquer rincão do país. O que ninguém sabe ao certo é quando aconteceu esse feliz encontro entre o polvilho e o queijo mineiro. “Não há consenso. De acordo com os estudiosos, a receita existe desde o século 18”, afirma Roberta Malta Saldanha, autora do livro Histórias, lendas e curiosidades da gastronomia (Editora Senac Rio).',1,15);
/*!40000 ALTER TABLE `tbl_destaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado`
--

LOCK TABLES `tbl_estado` WRITE;
/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` VALUES (11,'Rondônia','RO'),(12,'Acre','AC'),(13,'Amazonas','AM'),(14,'Roraima','RR'),(15,'Pará','PA'),(16,'Amapá','AP'),(17,'Tocantins','TO'),(21,'Maranhão','MA'),(22,'Piauí','PI'),(23,'Ceará','CE'),(24,'Rio Grande do Norte','RN'),(25,'Paraíba','PB'),(26,'Pernambuco','PE'),(27,'Alagoas','AL'),(28,'Sergipe','SE'),(29,'Bahia','BA'),(31,'Minas Gerais','MG'),(32,'Espírito Santo','ES'),(33,'Rio de Janeiro','RJ'),(35,'São Paulo','SP'),(41,'Paraná','PR'),(42,'Santa Catarina','SC'),(43,'Rio Grande do Sul','RS'),(50,'Mato Grosso do Sul','MS'),(51,'Mato Grosso','MT'),(52,'Goiás','GO'),(53,'Distrito Federal','DF');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loja`
--

DROP TABLE IF EXISTS `tbl_loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_loja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(200) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `horario_abertura` time NOT NULL,
  `horario_fechamento` time NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cidade` (`id_cidade`),
  CONSTRAINT `tbl_loja_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `tbl_cidade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loja`
--

LOCK TABLES `tbl_loja` WRITE;
/*!40000 ALTER TABLE `tbl_loja` DISABLE KEYS */;
INSERT INTO `tbl_loja` VALUES (1,'Teste','Teste',3233,323,'22:22:00','22:22:00',0,3534401),(3,'Av. Luis Carlos Berrini, 60','43423-434',-23.6022,-46.692,'06:30:00','20:00:00',1,3550308),(4,'Av. Dionysia Alves Barreto, 288 ','54366-765',-23.5358,-46.7836,'07:00:00','21:00:00',1,3534401),(5,'R. Gen. Florêncio, 509 ','22132-433',-23.528,-46.8132,'07:00:00','21:00:00',1,3534401);
/*!40000 ALTER TABLE `tbl_loja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'Administrador',1),(2,'Cataloguista',1),(3,'Operador Básico',1),(13,'Teste AJAX',0),(14,'Teste AJAX 2',0),(15,'Teste AJAX 3',0);
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagina`
--

DROP TABLE IF EXISTS `tbl_pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagina`
--

LOCK TABLES `tbl_pagina` WRITE;
/*!40000 ALTER TABLE `tbl_pagina` DISABLE KEYS */;
INSERT INTO `tbl_pagina` VALUES (1,'Home'),(2,'Produtos'),(3,'Sobre'),(4,'Serviços'),(5,'Lojas'),(6,'Fale Conosco');
/*!40000 ALTER TABLE `tbl_pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descricao` text NOT NULL,
  `quantidade` int(11) NOT NULL,
  `caminho_imagem` varchar(200) NOT NULL,
  `clique` int(11) DEFAULT NULL,
  `situacao` tinyint(4) NOT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sub_categoria` (`id_subcategoria`),
  CONSTRAINT `tbl_produto_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `tbl_subcategoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (1,'Pão Francês',0.5,'Pão Francês com 50g a unidade.',20,'Imagens/imagens_produtos/fa7c237cb15bd18537ebbd6bd4d6e847.jpg',9,1,2),(2,'Rosquinha',5,'Rosquinha com diversos sabores.',10,'Imagens/imagens_produtos/aa2b2ecfa3de40103b9d7b362281e0ca.jpg',4,0,4),(4,'Pão de Frios',5,' Pão de Frios com diversos sabores.',5,'Imagens/imagens_produtos/2efce4d95d8359a9d78d2b29454e48cf.jpg',2,0,9),(5,'Bolo',8,'Bolo com diversos sabores e tipos de coberturas.',3,'Imagens/imagens_produtos/b6f07ebf62dcbf6fe3a79fbf0ac87183.jpg',2,0,1),(6,'Croissant',4,'Croissant com diversos sabores.',15,'Imagens/imagens_produtos/282cdf3a509da45a5391d6466aea6fe8.png',9,1,10),(7,'Folhado Salgado',3,'Folhado salgado com mussarela, frango ou calabresa.',12,'Imagens/imagens_produtos/c4e910d00fd75ece9d29cfc5771e101f.jpg',2,1,10),(8,'Canudo de Chocolate',1,'Canudo de Chocolate 20g a unidade.',8,'Imagens/imagens_produtos/2c60e8f64706f8d9053aaa61df58aba4.jpg',3,1,11),(9,'Baguete',5,'Baguete 50cm de comprimento.',20,'Imagens/imagens_produtos/b2c7902f21ac135a00c3d2df5b140262.jpg',4,1,2),(10,'Esfiha  ',3,'Esfiha fechada com os sabores de carne, frango, queijo e mussarela.',9,'Imagens/imagens_produtos/d1d65dee350b8f80dc67cbf78ad2b1fd.jpg',3,1,12),(11,'Biscoito',0.5,'Biscoito com cobertura de chocolate e feito de amido de milho.',25,'Imagens/imagens_produtos/e10588bd33714c370fc246a01620b2b9.jpg',3,1,11),(15,'Pão de Queijo',0.5,'Pão de Queijo 50g cada.',50,'Imagens/imagens_produtos/074723041b0a7af8260cb128f90532a4.jpg',4,1,13);
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desconto` float NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `id_produto` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_promocao_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (1,0.5,'2018-04-20','2018-05-10',1,1),(3,0.4,'2018-04-23','2018-05-05',2,1),(8,0.4,'2018-05-06','2018-05-30',5,1),(9,0.7,'2018-05-20','2018-06-21',4,1),(11,0.6,'2018-05-15','2018-06-17',11,1),(12,0.9,'2018-05-11','2018-06-12',9,1),(13,0.2,'2018-05-18','2018-05-30',6,1),(14,0.1,'2018-05-22','2018-06-10',8,1);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategoria`
--

DROP TABLE IF EXISTS `tbl_subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tbl_subcategoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategoria`
--

LOCK TABLES `tbl_subcategoria` WRITE;
/*!40000 ALTER TABLE `tbl_subcategoria` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria` VALUES (1,'Bolos',6,1),(2,'Pão de Farinha de Trigo',3,1),(4,'Donuts',6,1),(5,'Refrigerantes',2,1),(6,'Sucos',2,1),(7,'Bebida com CafÃ©',1,1),(8,'Bebida com Chocolate',1,1),(9,'Pão de Frios',3,1),(10,'Massa Folhada',3,1),(11,'Bombom',6,1),(12,'Tortas',5,1),(13,'Pão de Polvilho',3,1);
/*!40000 ALTER TABLE `tbl_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `celular` varchar(13) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nivel` (`id_nivel`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `tbl_nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (8,'Teste 1','','Teste 1','teste1@hotmail.com','11 3599-4350','11 94343-4343',0,1),(12,'Teste 2','202cb962ac59075b964b07152d234b70','Teste 2','teste_2@hotmail.com','11 3557-6768','11 95445-6757',1,3),(13,'Teste 3','202cb962ac59075b964b07152d234b70','Teste 3','teste_3@hotmail.com','11 3557-6768','11 95445-6757',1,2),(14,'CaioV1','202cb962ac59075b964b07152d234b70','Caio Victor','caiovictor@hotmail.com','11 3557-6768','11 95445-6757',1,1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_categoria`
--

DROP TABLE IF EXISTS `view_categoria`;
/*!50001 DROP VIEW IF EXISTS `view_categoria`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_categoria` AS SELECT 
 1 AS `id`,
 1 AS `nome`,
 1 AS `id_categoria`,
 1 AS `situacao`,
 1 AS `categoria`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_conteudo_pagina`
--

DROP TABLE IF EXISTS `view_conteudo_pagina`;
/*!50001 DROP VIEW IF EXISTS `view_conteudo_pagina`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_conteudo_pagina` AS SELECT 
 1 AS `id`,
 1 AS `titulo`,
 1 AS `caminho_imagem`,
 1 AS `texto`,
 1 AS `situacao`,
 1 AS `id_pagina`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_destaque_produto`
--

DROP TABLE IF EXISTS `view_destaque_produto`;
/*!50001 DROP VIEW IF EXISTS `view_destaque_produto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_destaque_produto` AS SELECT 
 1 AS `id`,
 1 AS `info_promo`,
 1 AS `situacao`,
 1 AS `id_produto`,
 1 AS `nome`,
 1 AS `preco`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_loja_cidade_estado`
--

DROP TABLE IF EXISTS `view_loja_cidade_estado`;
/*!50001 DROP VIEW IF EXISTS `view_loja_cidade_estado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_loja_cidade_estado` AS SELECT 
 1 AS `id`,
 1 AS `logradouro`,
 1 AS `cep`,
 1 AS `latitude`,
 1 AS `longitude`,
 1 AS `horario_abertura`,
 1 AS `horario_fechamento`,
 1 AS `situacao`,
 1 AS `id_cidade`,
 1 AS `cidade`,
 1 AS `id_estado`,
 1 AS `estado`,
 1 AS `sigla`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_produto_categoria`
--

DROP TABLE IF EXISTS `view_produto_categoria`;
/*!50001 DROP VIEW IF EXISTS `view_produto_categoria`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_produto_categoria` AS SELECT 
 1 AS `id`,
 1 AS `nome`,
 1 AS `preco`,
 1 AS `descricao`,
 1 AS `quantidade`,
 1 AS `caminho_imagem`,
 1 AS `situacao`,
 1 AS `id_subcategoria`,
 1 AS `subcategoria`,
 1 AS `categoria`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_promocao_produto`
--

DROP TABLE IF EXISTS `view_promocao_produto`;
/*!50001 DROP VIEW IF EXISTS `view_promocao_produto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_promocao_produto` AS SELECT 
 1 AS `id`,
 1 AS `desconto`,
 1 AS `data_inicio`,
 1 AS `data_fim`,
 1 AS `id_produto`,
 1 AS `situacao`,
 1 AS `nomeProduto`,
 1 AS `preco`,
 1 AS `quantidade`,
 1 AS `caminho_imagem`,
 1 AS `descricao`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_usuario_nivel`
--

DROP TABLE IF EXISTS `view_usuario_nivel`;
/*!50001 DROP VIEW IF EXISTS `view_usuario_nivel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_usuario_nivel` AS SELECT 
 1 AS `id`,
 1 AS `login`,
 1 AS `senha`,
 1 AS `nome`,
 1 AS `email`,
 1 AS `telefone`,
 1 AS `celular`,
 1 AS `id_nivel`,
 1 AS `nivel`,
 1 AS `situacao`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_categoria`
--

/*!50001 DROP VIEW IF EXISTS `view_categoria`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_categoria` AS select `s`.`id` AS `id`,`s`.`nome` AS `nome`,`s`.`id_categoria` AS `id_categoria`,`s`.`situacao` AS `situacao`,`c`.`nome` AS `categoria` from (`tbl_subcategoria` `s` join `tbl_categoria` `c` on((`s`.`id_categoria` = `c`.`id`))) order by `s`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_conteudo_pagina`
--

/*!50001 DROP VIEW IF EXISTS `view_conteudo_pagina`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_conteudo_pagina` AS select `c`.`id` AS `id`,`c`.`titulo` AS `titulo`,`c`.`caminho_imagem` AS `caminho_imagem`,`c`.`texto` AS `texto`,`c`.`situacao` AS `situacao`,`c`.`id_pagina` AS `id_pagina`,`p`.`nome` AS `nome` from (`tbl_conteudo` `c` join `tbl_pagina` `p` on((`c`.`id_pagina` = `p`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_destaque_produto`
--

/*!50001 DROP VIEW IF EXISTS `view_destaque_produto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_destaque_produto` AS select `d`.`id` AS `id`,`d`.`info_promo` AS `info_promo`,`d`.`situacao` AS `situacao`,`d`.`id_produto` AS `id_produto`,`p`.`nome` AS `nome`,`p`.`preco` AS `preco` from (`tbl_destaque` `d` join `tbl_produto` `p` on((`d`.`id_produto` = `p`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_loja_cidade_estado`
--

/*!50001 DROP VIEW IF EXISTS `view_loja_cidade_estado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_loja_cidade_estado` AS select `l`.`id` AS `id`,`l`.`logradouro` AS `logradouro`,`l`.`cep` AS `cep`,`l`.`latitude` AS `latitude`,`l`.`longitude` AS `longitude`,time_format(`l`.`horario_abertura`,'%Hh%i') AS `horario_abertura`,time_format(`l`.`horario_fechamento`,'%Hh%i') AS `horario_fechamento`,`l`.`situacao` AS `situacao`,`l`.`id_cidade` AS `id_cidade`,`c`.`nome` AS `cidade`,`c`.`id_estado` AS `id_estado`,`e`.`nome` AS `estado`,`e`.`sigla` AS `sigla` from ((`tbl_loja` `l` join `tbl_cidade` `c` on((`l`.`id_cidade` = `c`.`id`))) join `tbl_estado` `e` on((`c`.`id_estado` = `e`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_produto_categoria`
--

/*!50001 DROP VIEW IF EXISTS `view_produto_categoria`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_produto_categoria` AS select `p`.`id` AS `id`,`p`.`nome` AS `nome`,`p`.`preco` AS `preco`,`p`.`descricao` AS `descricao`,`p`.`quantidade` AS `quantidade`,`p`.`caminho_imagem` AS `caminho_imagem`,`p`.`situacao` AS `situacao`,`p`.`id_subcategoria` AS `id_subcategoria`,`s`.`nome` AS `subcategoria`,`c`.`nome` AS `categoria` from ((`tbl_produto` `p` join `tbl_subcategoria` `s` on((`p`.`id_subcategoria` = `s`.`id`))) join `tbl_categoria` `c` on((`s`.`id_categoria` = `c`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_promocao_produto`
--

/*!50001 DROP VIEW IF EXISTS `view_promocao_produto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_promocao_produto` AS select `pr`.`id` AS `id`,`pr`.`desconto` AS `desconto`,date_format(`pr`.`data_inicio`,'%d/%m/%Y') AS `data_inicio`,date_format(`pr`.`data_fim`,'%d/%m/%Y') AS `data_fim`,`pr`.`id_produto` AS `id_produto`,`pr`.`situacao` AS `situacao`,`p`.`nome` AS `nomeProduto`,`p`.`preco` AS `preco`,`p`.`quantidade` AS `quantidade`,`p`.`caminho_imagem` AS `caminho_imagem`,`p`.`descricao` AS `descricao` from (`tbl_promocao` `pr` join `tbl_produto` `p` on((`pr`.`id_produto` = `p`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_usuario_nivel`
--

/*!50001 DROP VIEW IF EXISTS `view_usuario_nivel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_usuario_nivel` AS select `u`.`id` AS `id`,`u`.`login` AS `login`,`u`.`senha` AS `senha`,`u`.`nome` AS `nome`,`u`.`email` AS `email`,`u`.`telefone` AS `telefone`,`u`.`celular` AS `celular`,`u`.`id_nivel` AS `id_nivel`,`n`.`nome` AS `nivel`,`u`.`situacao` AS `situacao` from (`tbl_usuario` `u` join `tbl_nivel` `n` on((`u`.`id_nivel` = `n`.`id`))) */;
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

-- Dump completed on 2018-06-10 19:52:34
