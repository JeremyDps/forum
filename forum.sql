-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 nov. 2019 à 17:49
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

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(3) NOT NULL AUTO_INCREMENT,
  `idTheme` int(3) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `createdAt` date NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `idTheme`, `auteur`, `contenu`, `createdAt`) VALUES
(1, 5, 'JDupuis', 'mon message', '2019-11-19'),
(2, 42, 'JDupuis', 'azeazeaze', '2019-11-19'),
(3, 42, 'JDupuis', 'azeazeaze', '2019-11-19'),
(4, 42, 'JDupuis', 'azeazeaze', '2019-11-19'),
(5, 41, 'JDupuis', 'message pour theme 35000', '2019-11-19'),
(6, 41, 'JDupuis', 'message pour theme 35000', '2019-11-19'),
(7, 41, 'JDupuis', 'message pour theme 35000', '2019-11-19'),
(8, 41, 'JDupuis', 'message pour theme 35000', '2019-11-19'),
(9, 41, 'JDupuis', 'message pour theme 35000', '2019-11-19'),
(10, 41, 'JDupuis', 'aze', '2019-11-19'),
(11, 41, 'JDupuis', 'ftsfhc', '2019-11-19'),
(12, 41, 'JDupuis', 'nul nul nul', '2019-11-19'),
(14, 1, 'JDupuis', 'bonjour', '2019-11-19'),
(15, 1, 'JDupuis', 'wesh ma gueule', '2019-11-19');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTopic` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `createdAt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `idTopic`, `name`, `createdBy`, `createdAt`) VALUES
(1, 1, 'theme 1 topic 1', 'JDupuis', '2019-11-12'),
(7, 10, 'theme4343', 'jeandup', '2019-11-12'),
(42, 15, 'theeeeeme', 'JDupuis', '2019-11-19'),
(41, 5, 'theme 35000', 'JDupuis', '2019-11-19'),
(40, 1, 'theme 2', 'JDupuis', '2019-11-19');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`, `createdAt`, `createdBy`, `nbrMembres`) VALUES
(1, 'topic 1 JDupuis', 'desc topic 1', '2019-10-14 16:20:54', 'JDupuis', 1),
(2, 'topic 1 Jean', 'desc topic 1', '2019-10-14 16:22:51', 'jeandup', 1),
(16, 'topic 2 Jean', 'desc topic 2', '2019-10-31 15:56:51', 'jeandup', 1),
(15, 'topic 2 JDupuis', 'desc topic 2', '2019-10-31 14:38:40', 'JDupuis', 1),
(5, 'topic 3 JDupuis', 'desc topic 3', '2019-10-21 14:18:20', 'JDupuis', 1),
(18, 'topic 4 Jean', 'desc topic 4', '2019-11-12 15:48:31', 'jeandup', 1),
(10, 'topic 3 Jean', 'desc topic 3', '2019-10-21 15:45:54', 'jeandup', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `username`, `adrMail`, `password`, `modifierUsername`, `nbConnexion`, `lastConnexionDatetime`) VALUES
(9, 'Dupuis', 'Jérémy', 'JDupuis', 'jeremy.dupuis10@gmail.com', '1234', 1, 43, '2019-11-19 15:41:36'),
(10, 'Dupont', 'Jean', 'jeandup', 'jea@gmail.com', '5678', 1, 14, '2019-11-12 14:56:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
