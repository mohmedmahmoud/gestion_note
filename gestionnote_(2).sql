-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Février 2020 à 11:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestionnote`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `idC` varchar(20) NOT NULL,
  `idN` varchar(20) NOT NULL,
  PRIMARY KEY (`idC`),
  KEY `idN` (`idN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idC`, `idN`) VALUES
('5c1', '5c'),
('5d1', '5d'),
('6c1', '6c'),
('6d1', '6d'),
('7c1', '7c'),
('7d1', '7d');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `numE` int(20) NOT NULL AUTO_INCREMENT,
  `nomE` varchar(20) NOT NULL,
  `idC` varchar(20) NOT NULL,
  PRIMARY KEY (`numE`),
  KEY `idC` (`idC`),
  KEY `idN` (`idC`),
  KEY `idC_2` (`idC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`numE`, `nomE`, `idC`) VALUES
(1, 'med mahmoud', '7c1'),
(2, 'kedeye', '7c1'),
(3, 'lebat', '7c1'),
(4, 'oumar', '7c1'),
(5, 'Selmou', '5d1'),
(6, 'sidi', '7d1'),
(7, 'Sidi', '6d1'),
(8, 'fetouh', '5c1'),
(9, 'med', '7d1'),
(10, 'fatma', '7d1'),
(11, 'ibouu', '7c1'),
(12, 'hawa', '5c1'),
(13, 'khadi', '7c1'),
(14, 'mamin', '7d1'),
(15, 'ahmed', '6c1'),
(16, 'brahim', '6c1'),
(17, 'dah', '6c1'),
(18, 'molae', '6c1'),
(19, 'abou', '6c1'),
(20, 'tetou', '6c1'),
(21, 'fato', '6c1'),
(22, 'kaled', '6c1');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `nomM` varchar(20) NOT NULL,
  `coeff` int(20) NOT NULL,
  `idN` varchar(20) NOT NULL,
  PRIMARY KEY (`nomM`,`idN`),
  KEY `idN` (`idN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`nomM`, `coeff`, `idN`) VALUES
('anglais', 2, '7c'),
('anglais', 2, '7d'),
('arab', 3, '7c'),
('arab', 3, '7d'),
('francais', 3, '5c'),
('francais', 3, '7c'),
('francais', 3, '7d'),
('IR', 3, '7c'),
('IR', 3, '7d'),
('math', 9, '6c'),
('math', 9, '7c'),
('math', 5, '7d'),
('phisique', 8, '7c'),
('physique', 8, '7d'),
('science', 5, '7c');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `idN` varchar(20) NOT NULL,
  PRIMARY KEY (`idN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`idN`) VALUES
('5c'),
('5d'),
('6c'),
('6d'),
('7c'),
('7d');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `numE` int(20) NOT NULL AUTO_INCREMENT,
  `nomM` varchar(20) NOT NULL,
  `note` int(20) NOT NULL,
  `idN` varchar(20) NOT NULL,
  PRIMARY KEY (`numE`,`nomM`,`idN`),
  KEY `numE` (`numE`),
  KEY `nomM` (`nomM`),
  KEY `numE_2` (`numE`),
  KEY `idM` (`nomM`),
  KEY `nomM_2` (`nomM`),
  KEY `idN` (`idN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`numE`, `nomM`, `note`, `idN`) VALUES
(1, 'anglais', 14, '7c'),
(1, 'arab', 17, '7c'),
(1, 'francais', 13, '7c'),
(2, 'anglais', 14, '7c'),
(2, 'arab', 14, '7c'),
(2, 'IR', 16, '7c'),
(2, 'math', 14, '7c'),
(2, 'science', 16, '7c'),
(3, 'anglais', 18, '7c'),
(3, 'arab', 12, '7c'),
(3, 'IR', 14, '7c'),
(3, 'math', 16, '7c'),
(3, 'phisique', 14, '7c'),
(17, 'science', 16, '7c');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE IF NOT EXISTS `prof` (
  `admin` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prof`
--

INSERT INTO `prof` (`admin`, `code`) VALUES
('med@gmail.com', '12345'),
('khoneyse', 'kedeye');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`idN`) REFERENCES `niveau` (`idN`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `classe` (`idC`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`idN`) REFERENCES `niveau` (`idN`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_4` FOREIGN KEY (`idN`) REFERENCES `matiere` (`idN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`numE`) REFERENCES `etudiant` (`numE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`nomM`) REFERENCES `matiere` (`nomM`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
