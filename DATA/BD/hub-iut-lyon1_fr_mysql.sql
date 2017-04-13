-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: hub-iut-lyon1.fr.mysql:3306
-- Generation Time: Mar 22, 2017 at 07:43 PM
-- Server version: 10.1.21-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hub_iut_lyon1_fr`
--
CREATE DATABASE `hub_iut_lyon1_fr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hub_iut_lyon1_fr`;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `coursID` int(11) NOT NULL AUTO_INCREMENT,
  `nomCours` varchar(255) NOT NULL,
  `fileURL` varchar(255) NOT NULL,
  `moduleIDC` int(11) NOT NULL,
  `auteurIDC` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `dateCours` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`coursID`),
  KEY `fk_utilisateurs` (`auteurIDC`) USING BTREE,
  KEY `fk_module` (`moduleIDC`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`coursID`, `nomCours`, `fileURL`, `moduleIDC`, `auteurIDC`, `titre`, `dateCours`) VALUES
(71, 'P7 Adrien CASTELLON.pdf', 'uploads/P7 Adrien CASTELLON.pdf', 10, 24, 'Le cours de BDA', '2017-01-31 22:40:52'),
(72, 'voltaire.docx', 'uploads/voltaire.docx', 4, 25, 'Cours de Pierre', '2017-02-01 08:32:17'),
(73, 'voltaire.docx', 'uploads/voltaire.docx', 4, 25, 'Cours de Pierre', '2017-02-01 08:32:22'),
(74, 'Calendrier DUT version étudiants        2016 2017      du 11 10 2016.pdf', 'uploads/Calendrier DUT version étudiants        2016 2017      du 11 10 2016.pdf', 10, 24, 'BDD calendar', '2017-02-01 09:39:44'),
(75, 'Adrien Castellon.pdf', 'uploads/Adrien Castellon.pdf', 13, 24, 'TpSE', '2017-02-23 08:44:40'),
(76, 'Adrien Castellon.pdf', 'uploads/Adrien Castellon.pdf', 10, 24, 'test', '2017-02-23 08:45:12'),
(77, 'client-config.png', 'uploads/client-config.png', 6, 36, 'prog java', '2017-03-22 14:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `courstutorat`
--

CREATE TABLE IF NOT EXISTS `courstutorat` (
  `id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `nomModule` varchar(255) NOT NULL,
  `jour` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time NOT NULL,
  `tuteur` int(11) NOT NULL,
  `eleve1` int(11) NOT NULL,
  `eleve2` int(11) DEFAULT NULL,
  `eleve3` int(11) DEFAULT NULL,
  `eleve4` int(11) DEFAULT NULL,
  `nbElevesTutorat` int(10) NOT NULL,
  `salle` varchar(8) DEFAULT NULL,
  `commentaireTutorat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eleve1` (`eleve1`),
  KEY `eleve2` (`eleve2`),
  KEY `eleve3` (`eleve3`),
  KEY `eleve4` (`eleve4`),
  KEY `nomModule` (`nomModule`),
  KEY `tuteur` (`tuteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `courstutorat`
--

INSERT INTO `courstutorat` (`id`, `nomModule`, `jour`, `heureDebut`, `heureFin`, `tuteur`, `eleve1`, `eleve2`, `eleve3`, `eleve4`, `nbElevesTutorat`, `salle`, `commentaireTutorat`) VALUES
(15, 'BDA', '2017-02-02', '12:00:00', '13:00:00', 29, 27, NULL, NULL, NULL, 1, 'S14', 'Je n''ai pas compris le JDBC'),
(16, 'Programmation C', '2017-02-09', '12:00:00', '13:00:00', 30, 27, 25, NULL, NULL, 2, 'S14', 'Je n''ai pas compris les pointeurs'),
(17, 'BDA', '2017-02-14', '16:00:00', '18:00:00', 29, 27, 25, NULL, NULL, 2, 'S26', 'Je n''ai pas compris JDBC'),
(18, 'PHP', '2017-02-08', '10:00:00', '12:00:00', 27, 25, NULL, NULL, NULL, 1, 'S14', 'Je n''ai pas compris le MVC'),
(19, 'PHP', '2017-02-17', '12:00:00', '13:00:00', 27, 25, NULL, NULL, NULL, 1, 'S26', 'Je n''ai pas compris la connexion à une BDD'),
(20, 'PHP', '2017-02-24', '08:00:00', '09:00:00', 27, 24, NULL, NULL, NULL, 1, '12', ''),
(21, 'PHP', '2017-03-09', '12:00:00', '13:00:00', 27, 27, 31, NULL, NULL, 2, 'S14', ''),
(22, 'Programmation C', '2017-03-08', '08:00:00', '10:00:00', 30, 31, 25, NULL, NULL, 2, 'S26', ''),
(23, 'BDA', '2017-03-10', '16:00:00', '17:00:00', 29, 31, 27, NULL, NULL, 2, 'S14', 'Je n''ai pas compris le JDBC.'),
(24, 'BDA', '2017-03-16', '12:00:00', '13:00:00', 29, 24, NULL, NULL, NULL, 1, 's12', 'Ex : "J''aimerais insister sur tel aspect de tel chapitre" ect...');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `GroupeID` int(11) NOT NULL AUTO_INCREMENT,
  `NomGroupe` varchar(2) NOT NULL,
  `Semestre` int(1) NOT NULL,
  PRIMARY KEY (`GroupeID`),
  KEY `GroupeID` (`GroupeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`GroupeID`, `NomGroupe`, `Semestre`) VALUES
(1, 'G1', 1),
(2, 'G2', 1),
(3, 'G3', 1),
(4, 'G4', 1),
(5, 'G5', 1),
(6, 'G6', 1),
(7, 'G1', 2),
(8, 'G2', 2),
(9, 'G3', 2),
(10, 'G4', 2),
(11, 'G6', 2),
(12, 'G1', 3),
(13, 'G2', 3),
(14, 'G3', 3),
(15, 'G4', 3),
(16, 'G6', 3),
(17, 'G1', 4),
(18, 'G2', 4),
(19, 'G3', 4),
(20, 'G4', 4),
(21, 'G6', 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `auteurID` int(11) NOT NULL,
  `sujetID` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateMessage` datetime NOT NULL,
  `messageValide` tinyint(1) NOT NULL,
  `premierMessage` tinyint(1) NOT NULL,
  `modification` datetime DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `dateSuppression` datetime DEFAULT NULL,
  PRIMARY KEY (`messageID`),
  KEY `sujetID` (`sujetID`),
  KEY `auteurID` (`auteurID`),
  KEY `sujetID_2` (`sujetID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=350 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `auteurID`, `sujetID`, `contenu`, `dateMessage`, `messageValide`, `premierMessage`, `modification`, `pseudo`, `dateSuppression`) VALUES
(319, 24, 175, 'Bonjour, le titre indique ma question.', '2017-01-31 22:39:08', 0, 1, NULL, 'Adrien', NULL),
(320, 25, 176, 'je suis là', '2017-02-02 09:02:16', 0, 1, NULL, 'pierre', NULL),
(321, 24, 177, 'SVP AIDE', '2017-02-23 08:46:08', 0, 1, NULL, 'Adrien', NULL),
(322, 35, 178, 'Avez-vous la réponse à la deuxième question de l''exercice 3 du TD 1 ? Merci !', '2017-03-14 16:58:42', 0, 1, '2017-03-16 13:42:29', 'Laurent', NULL),
(324, 24, 180, 'jai besoin d''aide pour la com', '2017-03-15 09:19:44', 0, 1, NULL, 'Adrien', NULL),
(325, 35, 178, 'Il faudrait que tu vérifies le chapitre 2 de ton cours, la partie 4 devrait t''aider à résoudre cet exercice.', '2017-03-16 13:42:53', 1, 0, NULL, 'Antonin', NULL),
(326, 35, 178, 'Merci de ta réponse, j''ai pu résoudre mon problème.', '2017-03-16 13:43:07', 0, 0, NULL, 'Laurent', NULL),
(327, 37, 181, '1', '2017-03-16 13:59:27', 0, 1, NULL, 'M. Jaloux', NULL),
(328, 37, 182, '2', '2017-03-16 13:59:30', 0, 1, NULL, 'M. Jaloux', NULL),
(329, 37, 183, '3', '2017-03-16 13:59:33', 0, 1, NULL, 'M. Jaloux', NULL),
(330, 37, 184, '4', '2017-03-16 13:59:37', 0, 1, NULL, 'M. Jaloux', NULL),
(331, 37, 185, '5', '2017-03-16 13:59:40', 0, 1, NULL, 'M. Jaloux', NULL),
(332, 37, 186, '6', '2017-03-16 13:59:43', 0, 1, NULL, 'M. Jaloux', NULL),
(333, 37, 187, '7', '2017-03-16 13:59:46', 0, 1, NULL, 'M. Jaloux', NULL),
(334, 37, 188, '8', '2017-03-16 13:59:49', 0, 1, NULL, 'M. Jaloux', NULL),
(336, 37, 190, '1', '2017-03-16 14:22:42', 0, 1, NULL, 'M. Jaloux', NULL),
(337, 37, 191, '2', '2017-03-16 14:22:44', 0, 1, NULL, 'M. Jaloux', NULL),
(338, 37, 192, '3', '2017-03-16 14:22:47', 0, 1, NULL, 'M. Jaloux', NULL),
(339, 37, 193, '4', '2017-03-16 14:22:49', 0, 1, NULL, 'M. Jaloux', NULL),
(340, 37, 194, '5', '2017-03-16 14:22:52', 0, 1, NULL, 'M. Jaloux', NULL),
(341, 37, 195, '6', '2017-03-16 14:22:55', 0, 1, NULL, 'M. Jaloux', NULL),
(342, 37, 196, '7', '2017-03-16 14:22:58', 0, 1, NULL, 'M. Jaloux', NULL),
(343, 37, 197, '8', '2017-03-16 14:23:00', 0, 1, NULL, 'M. Jaloux', NULL),
(344, 37, 198, '9', '2017-03-16 14:23:07', 0, 1, NULL, 'M. Jaloux', NULL),
(345, 37, 199, '10', '2017-03-16 14:23:12', 0, 1, NULL, 'M. Jaloux', NULL),
(346, 37, 200, '11', '2017-03-16 14:23:51', 0, 1, NULL, 'M. Jaloux', NULL),
(347, 36, 180, 'blabla', '2017-03-22 14:27:20', 0, 0, NULL, 'Utilisateur anonyme', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `nomModule` varchar(255) NOT NULL,
  `semestre` int(11) NOT NULL,
  `Coefficient` float NOT NULL,
  `tuteur` int(11) DEFAULT NULL,
  `nbEpingle` int(11) NOT NULL DEFAULT '0',
  `image` varchar(50) NOT NULL,
  `UE` varchar(30) NOT NULL,
  PRIMARY KEY (`moduleID`),
  KEY `tuteur` (`tuteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `nomModule`, `semestre`, `Coefficient`, `tuteur`, `nbEpingle`, `image`, `UE`) VALUES
(3, 'Probabilités et Statistiques', 3, 2.5, NULL, 0, 'iconmaths', 'Général'),
(4, 'Communication ', 1, 0, NULL, 1, 'iconcom', 'Général'),
(5, 'Programmation C', 1, 0, 30, 0, 'iconc', 'Informatique'),
(6, 'Programmation Java', 2, 0, NULL, 0, 'iconjava', 'Informatique'),
(7, 'Communication', 2, 0, NULL, 2, 'iconcom', 'Général'),
(8, 'Communication', 3, 1.5, NULL, 0, 'iconcom', 'Général'),
(9, 'Communication', 4, 0, NULL, 0, 'iconcom', 'Général'),
(10, 'BDA', 3, 1.5, 29, 0, 'iconsql', 'Informatique'),
(11, 'Algo avancé', 4, 0, NULL, 0, 'iconalgo', 'Informatique'),
(12, 'SE cours ', 3, 1.5, NULL, 0, 'iconwindows', 'Informatique'),
(13, 'SE TP', 3, 1, NULL, 0, 'iconlinux', 'Informatique'),
(14, 'Réseau', 3, 1.5, NULL, 1, 'iconreseau', 'Informatique'),
(15, 'Algo avancée', 3, 1.5, NULL, 2, 'iconalgo', 'Informatique'),
(16, 'PHP', 3, 1.5, 27, 0, 'iconphp', 'Informatique'),
(17, 'CPOA', 3, 2.5, NULL, 0, 'iconcpoa', 'Informatique'),
(18, 'Modélisation mathématiques', 3, 1.5, NULL, 0, 'iconmaths', 'Général'),
(19, 'TIC Droit', 3, 1.5, NULL, 0, 'icondroit', 'Général'),
(20, 'GSI 1', 3, 1.3, NULL, 0, 'icongsi', 'Général'),
(21, 'GSI 2', 3, 1.2, NULL, 0, 'icongsi', 'Général'),
(22, 'Anglais', 0, 2.5, NULL, 3, 'iconenglish', 'Général'),
(23, 'PTUT', 3, 2, NULL, 0, 'iconptut', 'Méthodologie'),
(24, 'Modélisation des processus', 3, 1.8, NULL, 0, 'iconmodproc', 'Méthodologie'),
(25, 'GPI', 3, 1.2, NULL, 0, 'icongpi', 'Méthodologie');

-- --------------------------------------------------------

--
-- Table structure for table `planningtutorat`
--

CREATE TABLE IF NOT EXISTS `planningtutorat` (
  `annee` int(4) NOT NULL,
  `numeroSemaine` int(2) unsigned NOT NULL,
  `heurePlanning` int(4) NOT NULL,
  `lundi` int(30) unsigned DEFAULT NULL,
  `mardi` int(30) unsigned DEFAULT NULL,
  `mercredi` int(30) unsigned DEFAULT NULL,
  `jeudi` int(30) unsigned DEFAULT NULL,
  `vendredi` int(30) unsigned DEFAULT NULL,
  KEY `lundi` (`lundi`),
  KEY `mardi` (`mardi`),
  KEY `mercredi` (`mercredi`),
  KEY `jeudi` (`jeudi`),
  KEY `vendredi` (`vendredi`),
  KEY `lundi_2` (`lundi`,`mardi`,`mercredi`,`jeudi`,`vendredi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planningtutorat`
--

INSERT INTO `planningtutorat` (`annee`, `numeroSemaine`, `heurePlanning`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`) VALUES
(2017, 1, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 4, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 12, NULL, NULL, NULL, 15, NULL),
(2017, 5, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 5, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 10, NULL, NULL, 18, NULL, NULL),
(2017, 6, 11, NULL, NULL, 18, NULL, NULL),
(2017, 6, 12, NULL, NULL, NULL, 16, NULL),
(2017, 6, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 6, 19, NULL, NULL, NULL, NULL, NULL),
(215, 3, 8, NULL, NULL, NULL, NULL, NULL),
(215, 3, 9, NULL, NULL, NULL, NULL, NULL),
(215, 3, 10, NULL, NULL, NULL, NULL, NULL),
(215, 3, 11, NULL, NULL, NULL, NULL, NULL),
(215, 3, 12, NULL, NULL, NULL, NULL, NULL),
(215, 3, 13, NULL, NULL, NULL, NULL, NULL),
(215, 3, 14, NULL, NULL, NULL, NULL, NULL),
(215, 3, 15, NULL, NULL, NULL, NULL, NULL),
(215, 3, 16, NULL, NULL, NULL, NULL, NULL),
(215, 3, 17, NULL, NULL, NULL, NULL, NULL),
(215, 3, 18, NULL, NULL, NULL, NULL, NULL),
(215, 3, 19, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 8, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 9, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 10, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 11, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 12, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 13, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 14, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 15, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 16, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 17, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 18, NULL, NULL, NULL, NULL, NULL),
(2015, 3, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 52, 19, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 8, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 9, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 10, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 11, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 12, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 13, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 14, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 15, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 16, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 17, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 18, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 12, NULL, NULL, NULL, NULL, 19),
(2017, 7, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 16, NULL, 17, NULL, NULL, NULL),
(2017, 7, 17, NULL, 17, NULL, NULL, NULL),
(2017, 7, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 7, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 8, NULL, NULL, NULL, NULL, 20),
(2017, 8, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 8, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 9, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 8, NULL, NULL, 22, NULL, NULL),
(2017, 10, 9, NULL, NULL, 22, NULL, NULL),
(2017, 10, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 12, NULL, NULL, NULL, 21, NULL),
(2017, 10, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 16, NULL, NULL, NULL, NULL, 23),
(2017, 10, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 10, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 12, NULL, NULL, NULL, 24, NULL),
(2017, 11, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 11, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 12, 19, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `sujetID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `auteurID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateSujet` datetime NOT NULL,
  `epingle` tinyint(1) NOT NULL,
  `clos` tinyint(1) NOT NULL,
  `messageValide` text,
  `nbVues` int(11) NOT NULL,
  `nbRep` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `dernierMessage` int(11) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `dateDernierChangement` datetime NOT NULL,
  PRIMARY KEY (`sujetID`),
  KEY `sujetID` (`sujetID`),
  KEY `auteurID` (`auteurID`),
  KEY `moduleID` (`moduleID`),
  KEY `dernierMessage` (`dernierMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `sujet`
--

INSERT INTO `sujet` (`sujetID`, `nom`, `auteurID`, `moduleID`, `message`, `dateSujet`, `epingle`, `clos`, `messageValide`, `nbVues`, `nbRep`, `priority`, `dernierMessage`, `pseudo`, `dateDernierChangement`) VALUES
(175, 'Comment établir le model MVC ?', 24, 16, 'Bonjour, le titre indique ma question.', '2017-01-31 22:39:08', 0, 0, NULL, 4, 1, 2, 319, 'Adrien', '2017-01-31 22:39:08'),
(176, 'studio hb', 25, 4, 'je suis là', '2017-02-02 09:02:16', 0, 0, NULL, 8, 1, 2, 320, 'pierre', '2017-02-02 09:02:16'),
(177, 'Probleme', 24, 3, 'SVP AIDE', '2017-02-23 08:46:08', 0, 0, NULL, 2, 1, 2, 321, 'Adrien', '2017-02-23 08:46:08'),
(178, 'Une petite question', 35, 3, 'test', '2017-03-14 16:58:42', 0, 1, 'Il faudrait que tu vérifies le chapitre 2 de ton cours, la partie 4 devrait t''aider à résoudre cet exercice.', 10, 3, 2, 326, 'Laurent', '2017-03-16 13:50:16'),
(180, 'Aide conte rendu com', 24, 4, 'jai besoin d''aide pour la com', '2017-03-15 09:19:44', 0, 0, NULL, 4, 2, 2, 347, 'Adrien', '2017-03-22 14:27:20'),
(181, '1', 37, 3, '1', '2017-03-16 13:59:27', 0, 0, NULL, 0, 1, 2, 327, 'M. Jaloux', '2017-03-16 13:59:27'),
(182, '2', 37, 3, '2', '2017-03-16 13:59:30', 0, 0, NULL, 0, 1, 2, 328, 'M. Jaloux', '2017-03-16 13:59:30'),
(183, '3', 37, 3, '3', '2017-03-16 13:59:33', 0, 0, NULL, 0, 1, 2, 329, 'M. Jaloux', '2017-03-16 13:59:33'),
(184, '4', 37, 3, '4', '2017-03-16 13:59:37', 0, 0, NULL, 0, 1, 2, 330, 'M. Jaloux', '2017-03-16 13:59:37'),
(185, '5', 37, 3, '5', '2017-03-16 13:59:40', 0, 0, NULL, 0, 1, 2, 331, 'M. Jaloux', '2017-03-16 13:59:40'),
(186, '6', 37, 3, '6', '2017-03-16 13:59:43', 0, 0, NULL, 0, 1, 2, 332, 'M. Jaloux', '2017-03-16 13:59:43'),
(187, '7', 37, 3, '7', '2017-03-16 13:59:46', 0, 0, NULL, 0, 1, 2, 333, 'M. Jaloux', '2017-03-16 13:59:46'),
(188, '8', 37, 3, '8', '2017-03-16 13:59:49', 0, 0, NULL, 1, 1, 2, 334, 'M. Jaloux', '2017-03-16 13:59:49'),
(190, '1', 37, 18, '1', '2017-03-16 14:22:42', 0, 0, NULL, 0, 1, 2, 336, 'M. Jaloux', '2017-03-16 14:22:42'),
(191, '2', 37, 18, '2', '2017-03-16 14:22:44', 0, 0, NULL, 0, 1, 2, 337, 'M. Jaloux', '2017-03-16 14:22:44'),
(192, '3', 37, 18, '3', '2017-03-16 14:22:47', 0, 0, NULL, 0, 1, 2, 338, 'M. Jaloux', '2017-03-16 14:22:47'),
(193, '4', 37, 18, '4', '2017-03-16 14:22:49', 0, 0, NULL, 0, 1, 2, 339, 'M. Jaloux', '2017-03-16 14:22:49'),
(194, '5', 37, 18, '5', '2017-03-16 14:22:52', 0, 0, NULL, 0, 1, 2, 340, 'M. Jaloux', '2017-03-16 14:22:52'),
(195, '6', 37, 18, '6', '2017-03-16 14:22:55', 0, 0, NULL, 0, 1, 2, 341, 'M. Jaloux', '2017-03-16 14:22:55'),
(196, '7', 37, 18, '7', '2017-03-16 14:22:58', 0, 0, NULL, 0, 1, 2, 342, 'M. Jaloux', '2017-03-16 14:22:58'),
(197, '8', 37, 18, '8', '2017-03-16 14:23:00', 0, 0, NULL, 0, 1, 2, 343, 'M. Jaloux', '2017-03-16 14:23:00'),
(198, '9', 37, 18, '9', '2017-03-16 14:23:07', 0, 0, NULL, 0, 1, 2, 344, 'M. Jaloux', '2017-03-16 14:23:07'),
(199, '10', 37, 18, '10', '2017-03-16 14:23:12', 0, 0, NULL, 0, 1, 2, 345, 'M. Jaloux', '2017-03-16 14:23:12'),
(200, '11', 37, 18, '11', '2017-03-16 14:23:51', 0, 0, NULL, 3, 1, 2, 346, 'M. Jaloux', '2017-03-16 14:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateurID` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `groupeID` int(11) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `avatar` varchar(123) NOT NULL DEFAULT 'USR.png',
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `confirmationCode` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`utilisateurID`),
  UNIQUE KEY `identifiant` (`identifiant`),
  KEY `groupeID` (`groupeID`),
  KEY `groupeID_2` (`groupeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurID`, `identifiant`, `motDePasse`, `groupeID`, `prenom`, `nom`, `pseudo`, `mail`, `tel`, `statut`, `avatar`, `public`, `confirmationCode`) VALUES
(24, 'p1503257', '$2y$10$FszLmA/wpIhlpTzCVNaSg.6Bl2s.oiUwbURP5MVk4uJBMcQCnC9NG', 13, 'Adrien', 'Castellon', 'Adrien', '', '', 'Admin', 'USR.png', 0, NULL),
(25, 'pierre', '$2y$10$1jjLRTyccB7u08RA4Og7LuEWSViYDNZUKzcYYjWnx9m59TPPxBcx.', 12, 'Pierre', 'Ducrozet', 'pierre', 'ducrozetpierre@hotmail.fr', '0674646863', 'Etudiant', 'USR.png', 0, NULL),
(27, 'p1501019', '$2y$10$ixgztpgGgodKtM.4V4xA3OeadKYd/rmgUmrrAaW99VNwsXZSB./FC', 12, 'Antonin', 'SPONTAK', 'Antonin', 'mail@gmail.com', '0688888888', 'Tuteur', 'USR.png', 0, NULL),
(28, 'p1578964', '$2y$10$Y64Q5Bjgm865nuKnb6BfbOFeM10seUn21R0/Bbgou0KUGI.HNKlZG', 12, 'Maxime', 'BOREL', 'Maxime', 'mail@gmail.com', '0688777777', 'Etudiant', 'USR.png', 0, NULL),
(29, 'p1506781', '$2y$10$ApC5ZZBFMB.McRfUGCSJ5u1CIimee9c9sNRZyp07gLe.loeGFLEY6', 12, 'Cebrail', 'YALCIN', 'Cebrail', 'mail@gmail.com', '0688777766', 'Tuteur', 'USR.png', 0, NULL),
(30, 'p1502652', '$2y$10$ws5xodVytQcUsYoHZ80kMek.KSHPVc7w.LAa0z/MlzVSVxH7vHt/2', 12, 'Mikael', 'DEIANA', 'Mika', 'oui@oui.ga', '0688888811', 'Tuteur', 'USR.png', 0, NULL),
(31, 'guest', '$2y$10$XThzD7vy8sX7KtKiXoaJp.IshEDB56G4FHIH3OxpZG3Z8AR3Wo8Pu', 13, 'DUPOND', 'Jean', 'GUEST', 'mail@gmail.com', '0611223344', 'Etudiant', 'USR.png', 0, NULL),
(33, 'p1503364', '$2y$10$g3Qhm0ZMD9yvR4o.uUpYwu96My9wKXrmieu7L.SPr3UmEBrh305d.', 14, 'ALALA', 'LALAL', 'FAN', 'sarah.mulciba@gmail.com', '', 'Enseignant', 'USR.png', 0, NULL),
(34, 'enseignant', '$2y$10$tl7j.zG8fgOcdOrSaH/dw.2oNK5MACEZhV1JAljx46oaiX4PeiBQi', 7, 'test', 'test', 'test', 'sarah.mulciba@gmail.com', '', 'Enseignant', 'USR.png', 0, NULL),
(35, 'p1505454', '$2y$10$XlCMSXijnfN4ULso3NzKc.EBoy1DOGaHOZhhtI0/c5KxTtFudmU2.', 1, 'Laurent', 'Blanc-Pattin', 'HamamacheKebab', '', '', 'Etudiant', 'USR.png', 0, NULL),
(36, 'test', '$2y$10$c5asWHMR0ugF5Lnm9mVmOOM1W/9yiZ74fJ7IOeoZvSxc8/IcJHY5e', 1, 'test', 'test', 'test', 'sarah.mulciba@gmail.com', '0642354322', 'Etudiant', 'beautiful-iceland-wallpaper-3974-4194-hd-wallpapers.jpg', 1, NULL),
(37, 'testprof', '$2y$10$7e1UEicSHP0McPd.FNHUKeL/FmXxYDM3rUpK9/qDkqnpBBUjN5XCO', 1, 'Christophe', 'Jaloux', 'M. Jaloux', '', '', 'Enseignant', 'USR.png', 0, NULL),
(62, 'p1500993', '$2y$10$iTPBwARsYWLgCXOfHckgwOPn0A..DHrDtvGviyy1ESn0GRCLMuVBO', 1, 'Noëline', 'Monfort', 'Noë', 'manon.monfort@etu.univ-lyon1.fr', '', 'Etudiant', 'USR.png', 0, NULL),
(63, 'anto', '$2y$10$K3EejnV9qquTymqpUEt4f.hZ0DBhSOhntD20atE15bCWwPwxAdKmG', 18, 'Antonin', 'SPONT', 'Anto', 'antonin.spontak@etu.univ-lyon1.fr', '0611223344', 'Etudiant', 'USR.png', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courstutorat`
--
ALTER TABLE `courstutorat`
  ADD CONSTRAINT `fk_eleve1_utilisateurs` FOREIGN KEY (`eleve1`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve2_utilisateurs` FOREIGN KEY (`eleve2`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve3_utilisateurs` FOREIGN KEY (`eleve3`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve4_utilisateurs` FOREIGN KEY (`eleve4`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tuteur_utilisateurs` FOREIGN KEY (`tuteur`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_tuteur` FOREIGN KEY (`tuteur`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `planningtutorat`
--
ALTER TABLE `planningtutorat`
  ADD CONSTRAINT `fk_jeudi_courstutorat` FOREIGN KEY (`jeudi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lundi_courstutorat` FOREIGN KEY (`lundi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mardi_courstutorat` FOREIGN KEY (`mardi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mercredi_courstutorat` FOREIGN KEY (`mercredi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vendredi_courstutorat` FOREIGN KEY (`vendredi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_groupeID` FOREIGN KEY (`groupeID`) REFERENCES `groupe` (`GroupeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
