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
-- Table structure for table `entrevistas`
--

DROP TABLE IF EXISTS `entrevistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrevistas` (
  `id_entrevistador` int(11) NOT NULL,
  `id_assistido` int(11) NOT NULL,
  `data_entrevista` date NOT NULL,
  `estado_saude` text,
  `observacao` text,
  KEY `entrevistaFk1` (`id_entrevistador`),
  KEY `entrevistaFk2` (`id_assistido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrevistas`
--

LOCK TABLES `entrevistas` WRITE;
/*!40000 ALTER TABLE `entrevistas` DISABLE KEYS */;
INSERT INTO `entrevistas` VALUES (4,1,'2018-05-28','\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis cursus sem dignissim risus dictum hendrerit. Suspendisse potenti. In posuere porttitor bibendum. Proin id mattis neque. Nulla elementum efficitur sapien a ultricies. Aenean maximus velit nunc, laoreet mattis lacus auctor ac. Sed consectetur metus mi, vitae fringilla lectus porta sit amet. Pellentesque dapibus varius quam ac dictum.\r\n\r\nQuisque et finibus lorem. Phasellus iaculis augue et purus aliquam, id sollicitudin dui porttitor. Maecenas a mauris eleifend, mattis arcu id, fermentum dolor. Duis tempus enim mauris, in molestie nunc molestie ut. Maecenas finibus nibh tempus volutpat aliquam. Nunc iaculis felis dui, id faucibus dui laoreet vitae. Morbi faucibus eleifend leo et suscipit. Phasellus consequat bibendum vehicula.\r\n\r\nMorbi pulvinar ante sit amet ex pellentesque sollicitudin. Integer in maximus nunc. Phasellus sit amet est at lectus ultricies cursus. Nam eu laoreet lectus. Ut ac nibh ac diam auctor ullamcorper. Cras maximus quam eget venenatis hendrerit. Nam ullamcorper varius tellus, eget sagittis metus posuere a. Integer sit amet metus sodales, aliquam lorem et, condimentum dui. Duis ac ligula tempor tellus iaculis aliquet. Vivamus vitae velit quis turpis ultricies vehicula at in eros. Vivamus finibus lacinia laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc varius maximus libero quis blandit.\r\n\r\nSuspendisse cursus imperdiet tristique. Sed ac tellus ante. Phasellus quam leo, tristique sed congue sed, cursus at risus. In hac habitasse platea dictumst. Sed consectetur purus massa, eu laoreet ligula malesuada ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur porta, mauris et porttitor congue, ante dui porttitor nulla, vel viverra mauris quam ut eros.\r\n\r\nNam maximus iaculis metus, ac pretium arcu mollis maximus. Pellentesque eget finibus neque. Nunc felis leo, consectetur et mollis sit amet, sagittis viverra neque. Proin egestas dui lorem, eu feugiat libero accumsan vitae. Aliquam non mattis odio. Vestibulum hendrerit quis augue sed venenatis. Etiam sodales quis dolor eu suscipit. Vestibulum tempus lobortis ipsum, quis iaculis orci consectetur id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque facilisis consectetur odio et rutrum. Mauris suscipit dictum posuere. ','\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis cursus sem dignissim risus dictum hendrerit. Suspendisse potenti. In posuere porttitor bibendum. Proin id mattis neque. Nulla elementum efficitur sapien a ultricies. Aenean maximus velit nunc, laoreet mattis lacus auctor ac. Sed consectetur metus mi, vitae fringilla lectus porta sit amet. Pellentesque dapibus varius quam ac dictum.\r\n\r\nQuisque et finibus lorem. Phasellus iaculis augue et purus aliquam, id sollicitudin dui porttitor. Maecenas a mauris eleifend, mattis arcu id, fermentum dolor. Duis tempus enim mauris, in molestie nunc molestie ut. Maecenas finibus nibh tempus volutpat aliquam. Nunc iaculis felis dui, id faucibus dui laoreet vitae. Morbi faucibus eleifend leo et suscipit. Phasellus consequat bibendum vehicula.\r\n\r\nMorbi pulvinar ante sit amet ex pellentesque sollicitudin. Integer in maximus nunc. Phasellus sit amet est at lectus ultricies cursus. Nam eu laoreet lectus. Ut ac nibh ac diam auctor ullamcorper. Cras maximus quam eget venenatis hendrerit. Nam ullamcorper varius tellus, eget sagittis metus posuere a. Integer sit amet metus sodales, aliquam lorem et, condimentum dui. Duis ac ligula tempor tellus iaculis aliquet. Vivamus vitae velit quis turpis ultricies vehicula at in eros. Vivamus finibus lacinia laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc varius maximus libero quis blandit.\r\n\r\nSuspendisse cursus imperdiet tristique. Sed ac tellus ante. Phasellus quam leo, tristique sed congue sed, cursus at risus. In hac habitasse platea dictumst. Sed consectetur purus massa, eu laoreet ligula malesuada ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur porta, mauris et porttitor congue, ante dui porttitor nulla, vel viverra mauris quam ut eros.\r\n\r\nNam maximus iaculis metus, ac pretium arcu mollis maximus. Pellentesque eget finibus neque. Nunc felis leo, consectetur et mollis sit amet, sagittis viverra neque. Proin egestas dui lorem, eu feugiat libero accumsan vitae. Aliquam non mattis odio. Vestibulum hendrerit quis augue sed venenatis. Etiam sodales quis dolor eu suscipit. Vestibulum tempus lobortis ipsum, quis iaculis orci consectetur id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque facilisis consectetur odio et rutrum. Mauris suscipit dictum posuere. '),(4,1,'2018-05-28','','testestee');
/*!40000 ALTER TABLE `entrevistas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-01 12:50:38
