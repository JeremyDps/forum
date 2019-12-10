-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 déc. 2019 à 10:15
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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `idTheme`, `auteur`, `contenu`, `createdAt`) VALUES
(43, 44, 'jeanJS', 'ouah trop bien !!', '2019-12-10'),
(42, 48, 'jeanJS', 'le JS c\'est trop bien car on peut faire des anim, c\'est trop cool :)', '2019-12-10'),
(40, 45, 'jeremyPHP', 'les autres avantages du php sont qu\'on peut faire un site dynamique et intéragir avec des BDD facilement', '2019-12-10'),
(41, 47, 'jeremyPHP', 'il faut d\'abord réussir à établir une architecture, ensuite une BDD', '2019-12-10'),
(39, 44, 'jeremyPHP', 'le php c\'est cool car il permet de faire des forums', '2019-12-10'),
(45, 45, 'jeanJS', 'un bon site dynamique', '2019-12-10'),
(44, 47, 'jeanJS', 'et bien organiser son code', '2019-12-10');

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `idTopic`, `name`, `createdBy`, `createdAt`) VALUES
(48, 22, 'explication', 'jeanJS', '2019-12-10'),
(47, 21, 'comment réussir un forum', 'jeremyPHP', '2019-12-10'),
(45, 20, 'autres avantages du php', 'jeremyPHP', '2019-12-10'),
(44, 20, 'pourquoi le php c\'est cool', 'jeremyPHP', '2019-12-10');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`, `createdAt`, `createdBy`, `nbrMembres`) VALUES
(21, 'une bonne note', 'toutes les raisons d\'avoir une bonne note', '2019-12-10 09:32:22', 'jeremyPHP', 1),
(22, 'JS', 'pourquoi le JS c\'est trop bien', '2019-12-10 09:34:07', 'jeanJS', 1),
(20, 'PHP', 'le php c\'est la vie', '2019-12-10 09:29:21', 'jeremyPHP', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `username`, `adrMail`, `password`, `modifierUsername`, `nbConnexion`, `lastConnexionDatetime`) VALUES
(30, 'Dupont', 'Jean', 'jeanJS', 'jeandup@gmail.com', '5678', 1, 1, '2019-12-10 09:33:53'),
(29, 'Dupuis', 'Jérémy', 'jeremyPHP', 'jeremy.dupuis10@gmail.com', '1234', 1, 1, '2019-12-10 09:27:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
