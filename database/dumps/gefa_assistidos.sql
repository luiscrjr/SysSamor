-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gefa
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

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
-- Table structure for table `assistidos`
--

DROP TABLE IF EXISTS `assistidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assistidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `documentos` varchar(255) DEFAULT NULL,
  `escolaridade` varchar(100) DEFAULT NULL,
  `profissao` int(11) DEFAULT NULL,
  `detalhe_profissao` text,
  `estado_civil` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `ctps` varchar(20) DEFAULT NULL,
  `titulo_eleitor` varchar(20) DEFAULT NULL,
  `local_nascimento` int(11) DEFAULT NULL,
  `local_dormitorio` int(11) DEFAULT NULL,
  `familia` text,
  `motivo_rua` text,
  `id_endereco` int(11) DEFAULT NULL,
  `nome_pessoa_indicou` varchar(100) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `eh_desabrigado` tinyint(1) DEFAULT NULL,
  `data_eh_desabrigado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assistidos`
--

LOCK TABLES `assistidos` WRITE;
/*!40000 ALTER TABLE `assistidos` DISABLE KEYS */;
INSERT INTO `assistidos` VALUES (1,'João da Silva',NULL,'20180524060556000000-1',NULL,0,NULL,'Divorciado','219874530-0','113445667-87',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1990-01-03',NULL,NULL),(2,'Maria da Silva',NULL,'20180524060549000000-2',NULL,0,NULL,'Casada','219874530-0','113445667-87',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1940-03-02',NULL,NULL),(3,'José da Silva',NULL,'20180524060521000000-3',NULL,0,NULL,'Solteiro','219874530-0','113445667-87',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1955-06-08',NULL,NULL),(4,'Jasper','','20180523100526000000-4','',0,'','','','','','',0,0,'','',0,'','0000-00-00',0,'0000-00-00 00:00:00'),(5,'André','','','',0,'','','','','','',0,0,'','',0,'','0000-00-00',0,'0000-00-00 00:00:00'),(6,'Joaquim','','','',0,'','','','','','',0,0,'','',0,'','0000-00-00',0,'0000-00-00 00:00:00'),(7,'Joaquim','','','',0,'','','','','','',0,0,'','',0,'','0000-00-00',0,'0000-00-00 00:00:00'),(8,'Joaquim','','','',0,'','','','','','',0,0,'','',0,'','0000-00-00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `assistidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-01 12:50:43
