-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forumahmed
CREATE DATABASE IF NOT EXISTS `forumahmed` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forumahmed`;

-- Listage de la structure de la table forumahmed. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.category : ~3 rows (environ)
DELETE FROM `category`;
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
  `email` varchar(50) NOT NULL,
  `rank` varchar(10) NOT NULL DEFAULT 'member',
  `phoneNumber` int(11) NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `banned` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.member : ~21 rows (environ)
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id_member`, `username`, `password`, `email`, `rank`, `phoneNumber`, `registerDate`, `banned`) VALUES
	(1, 'Carambar', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'carambar@gmail.com', 'member', 555993, '2022-11-03 00:00:00', 0),
	(2, 'Helice45', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'helice.45@gmail.com', 'member', 911, '2022-11-03 00:00:00', 0),
	(3, 'Koco', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'studiokoco@gmail.com', 'admin', 444589, '2019-11-03 00:00:00', 0),
	(5, 'Pseudo', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'adresseemail@gmail.com', 'member', 555444, '2022-11-16 09:13:54', 0),
	(6, 'iiyama', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'iiyama@test.fr', 'member', 555444, '2022-11-16 09:15:08', 0),
	(7, 'testeste', '$2y$10$sG7/MM959Q7BAWzfbTWPsuU7i/SewGxgvaK3SND26l3Mfxh7Wgr6W', 'test1@test.fr', 'membre', 555444, '2022-11-16 09:43:28', 0),
	(8, 'BlueFire1234', '$2y$10$ZPLf4KFFZdBf.aGG/Bp88uyRjIgbiKKdWbJqpZzCUzNzBXrGj5e8.', 'bluefire@gmail.com', 'member', 555444, '2022-11-16 14:16:04', 0),
	(9, 'Fatima', '$2y$10$tRD7Pdy7e7dJhgSAV7qIZ.pjSoj3jtPeP4V0mbDP.Wn9jbhYptFgy', 'fatima@fatima.fatima', 'member', 555444, '2022-11-17 09:32:32', 0),
	(10, 'Bop', '$2y$10$oBQ3WkYWmhhqWb9564hDv.DTWDUo4b7isxe1uzwcal.vT42OSjU4.', 'bop@bop.com', 'member', 555444, '2022-11-17 09:55:27', 0),
	(11, 'Bap', '$2y$10$B0nRFi/WV0xwiHbir6nN0.fzIOD4EaftrTiu/TDsixHCJBlAej0/e', 'bap@bap.com', 'member', 555444, '2022-11-17 09:56:28', 0),
	(12, 'Bup', '$2y$10$W6SOMNpxhpSX6oni.yNnNOGqxCXHwcSEBvrwhY9aT44yW4OjiLmka', 'bup@bup.com', 'member', 555444, '2022-11-17 09:57:10', 0),
	(13, 'Boup', '$2y$10$scghOweGBH2ouW0XkVDABua1Ba3F4QrXn8X8DeZFjzoVQUS0JNYd.', 'boup@boup.com', 'member', 555444, '2022-11-17 09:58:51', 0),
	(14, 'bep', '$2y$10$MDwlN9HG7iODTvhbkXPKounjVL842atMLpA1YSHArCr2RQEjQvFkG', 'bep@bep.com', 'member', 555444, '2022-11-17 10:00:53', 0),
	(15, 'baop', '$2y$10$3ju7iiBsjInJZ4WzJR2pMOFuX1SJ3r8ewpSIc7sWrH3MVHWHxk44O', 'baop@baop.com', 'member', 555444, '2022-11-17 10:01:41', 0),
	(16, 'Bob', '$2y$10$uRbu/JiQYi9dxuNfXrDGAe5BM909YHuqDnLhtlLcf7YYW7UeggCEm', 'bob@bob.bob', 'member', 555444, '2022-11-17 10:04:11', 0),
	(17, 'aze', '$2y$10$8ufPMNIvXd4rCb.CavUW6.xrtmTRDBN96xfVBFOJLvOoHC5/lAFKy', 'aze@aze.fr', 'member', 555444, '2022-11-17 10:38:22', 0),
	(18, 'RedFire1234', '$2y$10$5nI8R1GIjHbTp6lPo8C4Z.DWdBkrHPCy5D7JsPwtjRUFuOsTgabtm', 'redfire@gmail.com', 'member', 555444, '2022-11-17 10:40:09', 0),
	(19, 'alfred', '$2y$10$zAA2FPATtE7GF.cVuaPugONZQ4gdNqVWyKTiewFfBMmebajRLzOwG', 'alfred@eazo.com', 'member', 555444, '2022-11-17 10:40:57', 0),
	(20, 'ok', '$2y$10$r41E.Q1..FLuFgG/KYk4/ulmofch9R3/SISswDqbvMJt69SRnROSK', 'ok@ok.ok', 'member', 555444, '2022-11-17 10:43:14', 0),
	(21, 'lundi', '$2y$10$lEX2pKvTGzLcN7r0tU7JgOPkswQ0osCZZHenbp1yUD8pt2A2dObDm', 'lundi@leaz.de', 'member', 555444, '2022-11-17 10:43:55', 0),
	(22, 'olive', '$2y$10$2CIP3ug/YaaX1uPNa2YeKupkLlz/cHPbQS9i5yw8wa.BtPLAtLl8C', 'ol@tf.rx', 'member', 555444, '2022-11-17 14:02:45', 0);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `postDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `topic_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `FK_message_sujet` (`topic_id`),
  KEY `membre_id` (`member_id`),
  CONSTRAINT `FK_message_membre` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.post : ~13 rows (environ)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id_post`, `text`, `postDate`, `topic_id`, `member_id`) VALUES
	(1, 'Barbe noir est le meilleur méchant de OP', '2022-11-16 08:44:06', 3, 1),
	(3, 'Attristé par la mort de Barbe Blanche...', '2022-11-16 08:44:07', 3, 2),
	(8, 'j\'ai ez l\'enderdragon', '2022-11-17 15:02:51', 4, 11),
	(11, 'Moi c&#039;est les husky', '2022-11-16 14:53:06', 5, 8),
	(12, 'Je pr&eacute;f&egrave;re les labradors ', '2022-11-16 14:53:57', 5, 5),
	(13, 'Les renards font des bruits bizarre', '2022-11-16 14:55:42', 6, 5),
	(14, 'C&#039;est l&eacute;gal d&#039;adopter un loup???', '2022-11-16 14:56:31', 7, 5),
	(21, 'Le loup est un canid&eacute;', '2022-11-16 15:04:33', 7, 8),
	(22, 'Le jaguar est l&#039;animal terrestre le plus rapide', '2022-11-16 15:05:07', 8, 8),
	(23, 'renard', '2022-11-17 14:09:30', 6, 3),
	(26, 'Vive Minecraft\r\n', '2022-11-17 15:07:07', 4, 3),
	(31, 'Garry&#039;s Mod meilleur jeu alltime! :)', '2022-11-17 16:11:03', 11, 3),
	(33, 'Test\r\n', '2022-11-17 16:16:57', 12, 3);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `closed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_topic`),
  KEY `categorie_id` (`category_id`),
  KEY `membre_id` (`member_id`),
  CONSTRAINT `FK__categorie` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK__membre` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.topic : ~8 rows (environ)
DELETE FROM `topic`;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `category_id`, `member_id`, `closed`) VALUES
	(3, 'One Piece', '2022-11-03 00:00:00', 2, 3, 0),
	(4, 'Minecraft', '2022-11-04 15:25:38', 1, 3, 0),
	(5, 'Les chiens', '2022-11-16 14:52:17', 3, 8, 0),
	(6, 'Les renards', '2022-11-16 14:55:42', 3, 5, 0),
	(7, 'Le loup', '2022-11-16 14:56:31', 3, 5, 0),
	(8, 'Le jaguar ', '2022-11-16 15:05:07', 3, 8, 0),
	(11, 'Garry&#039;s Mod', '2022-11-17 16:11:03', 1, 3, 0),
	(12, 'OverWatch 2', '2022-11-17 16:12:49', 1, 8, 1);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
