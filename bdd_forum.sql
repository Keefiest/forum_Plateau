-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forumahmed
CREATE DATABASE IF NOT EXISTS `forumahmed` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forumahmed`;

-- Listage de la structure de la table forumahmed. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_category`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.category : ~3 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id_category`, `nameCategory`) VALUES
	(1, 'Jeux Vidéos'),
	(2, 'Séries'),
	(3, 'Animaux');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. member
CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `rank` varchar(10) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `inscriptionDate` date NOT NULL,
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.member : ~3 rows (environ)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id_member`, `username`, `password`, `adresseMail`, `rank`, `phoneNumber`, `inscriptionDate`) VALUES
	(1, 'Carambar', 'azerty123', 'carambar@gmail.com', 'membre', 555993, '2022-11-03'),
	(2, 'Helice45', 'motdepasse1', 'helice.45@gmail.com', 'membre', 911, '2022-11-03'),
	(3, 'Koco', '12345abc', 'studiokoco@gmail.com', 'membre', 444589, '2019-11-03');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `FK_message_sujet` (`topic_id`) USING BTREE,
  KEY `membre_id` (`member_id`) USING BTREE,
  CONSTRAINT `FK_post_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`),
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.post : ~2 rows (environ)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id_post`, `text`, `topic_id`, `member_id`) VALUES
	(1, 'Barbe noir est le meilleur méchant de OP', 3, 1),
	(2, 'Je préfère les chiens moi', 2, 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `creationDate` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `closed` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `member_id` (`member_id`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.topic : ~3 rows (environ)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `category_id`, `member_id`, `closed`) VALUES
	(1, 'Overwatch 2', '2022-11-03', 1, 3, NULL),
	(2, 'Les chats', '2022-08-03', 3, 2, NULL),
	(3, 'One Piece', '2022-11-03', 2, 3, NULL);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
