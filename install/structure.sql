-- phpMyAdmin SQL Dump

-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Décembre 2015 à 15:10
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
-- Structure de la table `admins`
--
-- Création :  Lun 21 Décembre 2015 à 09:18
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `login` varchar(8) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`login`) VALUES
('duruptal'),
('jdekhtia');

-- --------------------------------------------------------

--
-- Structure de la table `assos`
--
-- Création :  Lun 21 Décembre 2015 à 09:18
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
('Billetterie', 'billetterie@assos.utc.fr', 'bc05063b0a126b900fa25c8de404391742f87e92'),
('Comet', 'comet@assos.utc.fr', '9cb5b53f83e271ec7803857b0b7803566d550330'),
('Etuville', 'etuville@assos.utc.fr', '87f520dbd23b6a642db9462d60096573c10d97c3'),
('TEDx', 'tedx@assos.utc.fr', '55cca751af12b1b0ece4e76f8d998a2e6fa7944c');

-- --------------------------------------------------------

--
-- Structure de la table `asso_assoc`
--
-- Création :  Lun 21 Décembre 2015 à 09:18
--

DROP TABLE IF EXISTS `asso_assoc`;
CREATE TABLE IF NOT EXISTS `asso_assoc` (
  `login` varchar(8) NOT NULL DEFAULT '',
  `association` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`login`,`association`),
  KEY `fk_asso_assoc` (`association`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `asso_assoc`
--

INSERT INTO `asso_assoc` (`login`, `association`, `role`) VALUES
('jdekhtia', 'Billetterie', 'Président'),
('clemaire', 'Billetterie', 'Trésorier');

-- --------------------------------------------------------

--
-- Structure de la table `asso_role`
--
-- Création :  Lun 21 Décembre 2015 à 09:18
--

DROP TABLE IF EXISTS `asso_role`;
CREATE TABLE IF NOT EXISTS `asso_role` (
  `role` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `asso_role`
--

INSERT INTO `asso_role` (`role`) VALUES
('Membre'),
('Président'),
('Trésorier');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--
-- Création :  Sam 26 Décembre 2015 à 22:37
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `asso` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` datetime NOT NULL,
  `eventStartSellingDate` datetime NOT NULL,
  `eventFlyer` varchar(255) NOT NULL,
  `eventTicketMax` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `assoID` (`asso`),
  KEY `eventName` (`eventName`),
  KEY `eventDate` (`eventDate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`eventID`, `asso`, `eventName`, `eventDate`, `eventStartSellingDate`, `eventFlyer`, `eventTicketMax`, `location`) VALUES
(1, 'Billetterie', 'ESTU de NOEL', '2016-06-14 22:30:00', '2015-05-15 18:30:00', 'images/upload/affiche.jpg', 900, 'Dream Famous Club'),
(2, 'Billetterie', 'Hackathon UTC', '2016-05-15 18:30:00', '2016-04-15 18:30:00', 'images/upload/affiche2.jpg', 70, 'Centre d''innovation'),
(3, 'Billetterie', 'Ski UTC', '2015-02-01 00:00:00', '2015-01-15 18:30:00', 'images/upload/affiche3.jpg', 400, 'Alpes');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--
-- Création :  Mer 30 Décembre 2015 à 13:56
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `tarifID` int(11) NOT NULL AUTO_INCREMENT,
  `eventID` int(11) NOT NULL,
  `tarifName` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `maxSold` int(11) NOT NULL,
  `maxByUser` int(11) NOT NULL,
  `startSellingDate` datetime NOT NULL,
  `endSellingDate` datetime NOT NULL,
  PRIMARY KEY (`tarifID`),
  KEY `eventID` (`eventID`,`tarifName`),
  KEY `tarifName` (`tarifName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tarifs`
--

INSERT INTO `tarifs` (`tarifID`, `eventID`, `tarifName`, `price`, `maxSold`, `maxByUser`, `startSellingDate`, `endSellingDate`) VALUES
(1, 1, 'Cotisant BDE-UTC', 7, 700, 1, '2015-05-15 18:30:00', '2016-06-14 22:30:00'),
(2, 1, 'Non Cotisant BDE-UTC', 9, 400, 1, '2015-05-15 18:30:00', '2016-06-14 22:30:00'),
(3, 1, 'Extérieur', 11, 200, 5, '2016-01-15 18:30:00', '2016-06-14 22:30:00'),
(4, 2, 'Extérieur', 11, 300, 5, '2016-04-15 18:30:00', '2016-05-15 18:30:00'),
(5, 2, 'Cotisant BDE-UTC', 8, 200, 1, '2016-04-15 18:30:00', '2016-05-15 18:30:00'),
(6, 2, 'Non Cotisant BDE-UTC', 5, 150, 1, '2016-04-25 18:30:00', '2016-05-15 18:30:00'),
(7, 3, 'Extérieur', 15, 800, 5, '2015-01-15 18:30:00', '2015-02-01 00:00:00'),
(8, 3, 'Cotisant BDE-UTC', 6.4, 200, 1, '2015-01-15 18:30:00', '2015-02-01 00:00:00'),
(9, 3, 'Non Cotisant BDE-UTC', 3, 100, 1, '2015-01-15 18:30:00', '2015-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tariftypes`
--
-- Création :  Lun 21 Décembre 2015 à 09:18
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
-- Création :  Mer 30 Décembre 2015 à 14:00
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketID` int(11) NOT NULL AUTO_INCREMENT,
  `tarifName` varchar(255) NOT NULL,
  `eventID` int(11) NOT NULL,
  `buyerLogin` varchar(8) NOT NULL,
  `ticketKey` varchar(15) NOT NULL,
  `buyingDate` datetime NOT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`ticketID`),
  KEY `tarifName` (`tarifName`,`eventID`,`buyerLogin`,`ticketKey`),
  KEY `eventID` (`eventID`),
  KEY `buyerLogin` (`buyerLogin`),
  KEY `ticketKey` (`ticketKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `tarifName`, `eventID`, `buyerLogin`, `ticketKey`, `buyingDate`, `price`) VALUES
(1, 'Cotisant BDE-UTC', 1, 'jdekhtia', 'aaaaaaaaaaaaaaa', '2015-12-14 22:30:00', '7'),
(2, 'Extérieur', 1, 'jdekhtia', 'bbbbbbbbbbbbbbb', '2015-12-14 22:30:00', '10'),
(3, 'Extérieur', 1, 'jdekhtia', 'ccccccccccccccc', '2015-12-14 22:30:00', '10'),
(4, 'Extérieur', 1, 'jdekhtia', 'ddddddddddddddd', '2015-12-14 22:30:00', '10'),
(5, 'Extérieur', 1, 'jdekhtia', 'eeeeeeeeeeeeeee', '2015-12-14 22:30:00', '10'),
(6, 'Extérieur', 1, 'jdekhtia', 'fffffffffffffff', '2015-12-14 22:30:00', '10'),
(7, 'Cotisant BDE-UTC', 1, 'colinajo', 'ggggggggggggggg', '2015-12-10 22:30:00', '7'),
(8, 'Cotisant BDE-UTC', 1, 'mguffroy', 'hhhhhhhhhhhhhhh', '2015-12-01 22:30:00', '7'),
(9, 'Extérieur', 1, 'mguffroy', 'iiiiiiiiiiiiiii', '2015-12-01 22:30:00', '10'),
(10, 'Extérieur', 1, 'mguffroy', 'jjjjjjjjjjjjjjj', '2015-12-05 22:30:00', '10'),
(11, 'Extérieur', 1, 'mguffroy', 'kkkkkkkkkkkkkkk', '2015-12-05 22:30:00', '10');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `asso_assoc`
--
ALTER TABLE `asso_assoc`
  ADD CONSTRAINT `fk_asso_assoc` FOREIGN KEY (`association`) REFERENCES `assos` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_role` FOREIGN KEY (`role`) REFERENCES `asso_role` (`role`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_eventID_ticket` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tariftype_ticket` FOREIGN KEY (`tarifName`) REFERENCES `tariftypes` (`tarifName`) ON DELETE NO ACTION ON UPDATE CASCADE;


--
-- Procédures
--

/* DROP PROCEDURE IF EXISTS `cleanDB`;
DELIMITER $$
CREATE PROCEDURE `cleanDB`()
LANGUAGE SQL
BEGIN 
DROP TABLE IF EXISTS `tickets`; 
DROP TABLE IF EXISTS `tarifs`; 
DROP TABLE IF EXISTS `tariftypes`; 
DROP TABLE IF EXISTS `events`; 
DROP TABLE IF EXISTS `asso_assoc`; 
DROP TABLE IF EXISTS `asso_role`; 
DROP TABLE IF EXISTS `assos`; 
DROP TABLE IF EXISTS `admins`; 
END$$ */

DELIMITER $$
DROP PROCEDURE IF EXISTS `cleanDB`$$
# MySQL a retourné un résultat vide (aucune ligne).

CREATE PROCEDURE `billetterie_utc`.`cleanDB`()
LANGUAGE SQL
BEGIN
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `tarifs`;
DROP TABLE IF EXISTS `tariftypes`;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `asso_assoc`;
DROP TABLE IF EXISTS `asso_role`;
DROP TABLE IF EXISTS `assos`;
DROP TABLE IF EXISTS `admins`;
END$$
# MySQL a retourné un résultat vide (aucune ligne).


DELIMITER ;

--
-- COMMIT
--
COMMIT


