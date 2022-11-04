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

-- Listage de la structure de la table forumahmed. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.categorie : ~3 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
	(1, 'Jeux Vidéos'),
	(2, 'Séries'),
	(3, 'Animaux');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. membre
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `numero_telephone` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.membre : ~3 rows (environ)
DELETE FROM `membre`;
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id_membre`, `pseudo`, `mot_de_passe`, `adresse_mail`, `role`, `numero_telephone`, `date_inscription`) VALUES
	(1, 'Carambar', 'azerty123', 'carambar@gmail.com', 'membre', 555993, '2022-11-03'),
	(2, 'Helice45', 'motdepasse1', 'helice.45@gmail.com', 'membre', 911, '2022-11-03'),
	(3, 'Koco', '12345abc', 'studiokoco@gmail.com', 'membre', 444589, '2019-11-03');
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `fermer` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_message_sujet` (`sujet_id`),
  KEY `membre_id` (`membre_id`),
  CONSTRAINT `FK_message_membre` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id_membre`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.message : ~0 rows (environ)
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `texte`, `sujet_id`, `membre_id`, `fermer`) VALUES
	(1, 'Barbe noir est le meilleur méchant de OP', 3, 1, NULL),
	(2, 'Je préfère les chiens moi', 2, 1, NULL);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forumahmed. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `date_creation` date NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `fermer` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `categorie_id` (`categorie_id`),
  KEY `membre_id` (`membre_id`),
  CONSTRAINT `FK__categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK__membre` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forumahmed.sujet : ~0 rows (environ)
DELETE FROM `sujet`;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_creation`, `categorie_id`, `membre_id`, `fermer`) VALUES
	(1, 'Overwatch 2', '2022-11-03', 1, 3, NULL),
	(2, 'Les chats', '2022-08-03', 3, 2, NULL),
	(3, 'One Piece', '2022-11-03', 2, 3, NULL);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
