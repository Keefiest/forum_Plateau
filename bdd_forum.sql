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

-- Listage des données de la table forumahmed.categorie : ~3 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
	(1, 'Jeux Vidéos'),
	(2, 'Séries'),
	(3, 'Animaux');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage des données de la table forumahmed.membre : ~3 rows (environ)
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id_membre`, `pseudo`, `mot_de_passe`, `adresse_mail`, `role`, `numero_telephone`, `date_inscription`) VALUES
	(1, 'Carambar', 'azerty123', 'carambar@gmail.com', 'membre', 555993, '2022-11-03'),
	(2, 'Helice45', 'motdepasse1', 'helice.45@gmail.com', 'membre', 911, '2022-11-03'),
	(3, 'Koco', '12345abc', 'studiokoco@gmail.com', 'membre', 444589, '2019-11-03');
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Listage des données de la table forumahmed.message : ~2 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `texte`, `sujet_id`, `membre_id`, `closed`) VALUES
	(1, 'Barbe noir est le meilleur méchant de OP', 3, 1, NULL),
	(2, 'Je préfère les chiens moi', 2, 1, NULL);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage des données de la table forumahmed.sujet : ~3 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_creation`, `categorie_id`, `membre_id`, `closed`) VALUES
	(1, 'Overwatch 2', '2022-11-03 11:51:33', 1, 3, NULL),
	(2, 'Les chats', '2022-08-03 11:52:14', 3, 2, NULL),
	(3, 'One Piece', '2022-11-03 11:53:36', 2, 3, NULL);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
