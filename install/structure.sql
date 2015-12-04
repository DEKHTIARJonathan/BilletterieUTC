-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Décembre 2015 à 10:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `billetterie_utc`
--

-- --------------------------------------------------------

--
-- Structure de la table `assos`
--

DROP TABLE IF EXISTS `assos`;
CREATE TABLE IF NOT EXISTS `assos` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payutcKey` varchar(255) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `payutcKey` (`payutcKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `assos`
--

INSERT INTO `assos` (`name`, `email`, `payutcKey`) VALUES
('billetterie', 'billetterie@assos.utc.fr', 'bc05063b0a126b900fa25c8de404391742f87e92'),
('etuville', 'etuville@assos.utc.fr', '87f520dbd23b6a642db9462d60096573c10d97c3');

-- --------------------------------------------------------

--
-- Structure de la table `asso_assoc`
--

DROP TABLE IF EXISTS `asso_assoc`;
CREATE TABLE IF NOT EXISTS `asso_assoc` (
  `login` varchar(8) NOT NULL DEFAULT '',
  `association` varchar(255) NOT NULL DEFAULT '',
  `role` enum('President','Tresorier','Membre') DEFAULT NULL,
  PRIMARY KEY (`login`,`association`),
  KEY `fk_asso_assoc` (`association`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `asso_assoc`
--

INSERT INTO `asso_assoc` (`login`, `association`, `role`) VALUES
('jdekhtia', 'billetterie', 'President');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `asso` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventFlyer` varchar(255) NOT NULL,
  `eventTicketMax` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `assoID` (`asso`),
  KEY `eventName` (`eventName`),
  KEY `eventDate` (`eventDate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`eventID`, `asso`, `eventName`, `eventDate`, `eventFlyer`, `eventTicketMax`, `location`) VALUES
(1, 'billetterie', 'ESTU de NOEL', '2015-12-24', 'images/upload/affiche.jpg', 900, 'Dream Famous Club'),
(2, 'billetterie', 'Hackathon UTC', '2015-12-18', 'images/upload/affiche2.jpg', 70, 'Centre d''innovation'),
(3, 'billetterie', 'Ski UTC', '2016-02-01', 'images/upload/affiche3.jpg', 400, 'Alpes'),
(7, 'billetterie', 'Estu Halloween', '2015-11-05', 'images/upload/wZ73PmTtNK09F0qH8tCa.png', 987, 'Dream Famous Club');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `login` varchar(8) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  PRIMARY KEY (`login`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `people`
--

INSERT INTO `people` (`login`, `role`) VALUES
('jdekhtia', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `tarifID` int(11) NOT NULL AUTO_INCREMENT,
  `eventID` int(11) NOT NULL,
  `tarifName` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `maxSold` int(11) NOT NULL,
  `maxByUser` int(11) NOT NULL,
  PRIMARY KEY (`tarifID`),
  KEY `eventID` (`eventID`,`tarifName`),
  KEY `tarifName` (`tarifName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tarifs`
--

INSERT INTO `tarifs` (`tarifID`, `eventID`, `tarifName`, `price`, `maxSold`, `maxByUser`) VALUES
(1, 1, 'Cotisant BDE-UTC', 7, 700, 1),
(2, 1, 'Non Cotisant BDE-UTC', 9, 400, 1),
(3, 1, 'Extérieur', 11, 200, 5),
(4, 2, 'Extérieur', 11, 300, 5),
(5, 2, 'Cotisant BDE-UTC', 8, 200, 1),
(6, 2, 'Non Cotisant BDE-UTC', 5, 150, 1),
(7, 3, 'Extérieur', 15, 800, 5),
(8, 3, 'Cotisant BDE-UTC', 6.4, 200, 1),
(9, 3, 'Non Cotisant BDE-UTC', 3, 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tariftypes`
--

DROP TABLE IF EXISTS `tariftypes`;
CREATE TABLE IF NOT EXISTS `tariftypes` (
  `tarifName` varchar(255) NOT NULL,
  `cotisant` tinyint(1) NOT NULL,
  `utc` tinyint(1) NOT NULL,
  PRIMARY KEY (`tarifName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tariftypes`
--

INSERT INTO `tariftypes` (`tarifName`, `cotisant`, `utc`) VALUES
('Cotisant BDE-UTC', 1, 1),
('Extérieur', 0, 0),
('Non Cotisant BDE-UTC', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketID` int(11) NOT NULL AUTO_INCREMENT,
  `tarifName` varchar(255) NOT NULL,
  `eventID` int(11) NOT NULL,
  `buyerLogin` varchar(8) NOT NULL,
  `ticketKey` varchar(15) NOT NULL,
  PRIMARY KEY (`ticketID`),
  KEY `tarifName` (`tarifName`,`eventID`,`buyerLogin`,`ticketKey`),
  KEY `eventID` (`eventID`),
  KEY `buyerLogin` (`buyerLogin`),
  KEY `ticketKey` (`ticketKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `tarifName`, `eventID`, `buyerLogin`, `ticketKey`) VALUES
(1, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(2, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(3, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(4, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(5, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(6, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(7, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(8, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(9, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(10, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(11, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(12, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(13, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(14, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(15, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(16, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(17, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(18, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(19, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa'),
(20, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `asso_assoc`
--
ALTER TABLE `asso_assoc`
  ADD CONSTRAINT `fk_asso_assoc` FOREIGN KEY (`association`) REFERENCES `assos` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`login`) REFERENCES `people` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_asso` FOREIGN KEY (`asso`) REFERENCES `assos` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tariftype` FOREIGN KEY (`tarifName`) REFERENCES `tariftypes` (`tarifName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_eventID_ticket` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tariftype_ticket` FOREIGN KEY (`tarifName`) REFERENCES `tariftypes` (`tarifName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
