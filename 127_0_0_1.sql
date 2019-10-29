-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 oct. 2019 à 13:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `nbrMembres` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`, `createdAt`, `createdBy`, `nbrMembres`) VALUES
(1, 'topic', 'mon topic', '2019-10-14 16:20:54', 'JDupuis', 1),
(2, 'super topic', 'topic de jean', '2019-10-14 16:22:51', 'jeandup', 1),
(5, 'aze', 'azeaze', '2019-10-21 14:18:20', 'JDupuis', 1),
(7, 'sqd', 'qsdqsd', '2019-10-21 14:53:39', 'JDupuis', 1),
(8, 'wxc', 'wxcwxc', '2019-10-21 15:29:46', 'JDupuis', 1),
(9, 'JKL', 'jkljkl', '2019-10-21 15:31:28', 'JDupuis', 1),
(10, 'fgh', 'fghfgh', '2019-10-21 15:45:54', 'jeandup', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `adrMail` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `modifierUsername` int(1) NOT NULL DEFAULT '1',
  `nbConnexion` int(3) NOT NULL DEFAULT '0',
  `lastConnexionDatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `username`, `adrMail`, `password`, `modifierUsername`, `nbConnexion`, `lastConnexionDatetime`) VALUES
(9, 'Dupuis', 'Jérémy', 'JDupuis', 'jeremy.dupuis10@gmail.com', '1234', 1, 31, '2019-10-29 13:45:31'),
(10, 'Dupont', 'Jean', 'jeandup', 'jea@gmail.com', '5678', 1, 11, '2019-10-25 08:44:25');
--
-- Base de données :  `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `age`, `mail`, `telephone`) VALUES
(1, 'Dupuis', 'Jérémy', 20, 'jeremy.dupuis10@gmail.com', '0123456789'),
(2, 'Durant', 'Xavier', 30, 'xavier.durant@yahoo.fr', '0987654321'),
(10, 'Ducmol', 'Bertrand', 40, 'bertrant.du@gmail.com', '1234567890');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
