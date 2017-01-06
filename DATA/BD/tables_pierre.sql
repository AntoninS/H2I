-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 30 Décembre 2016 à 16:37
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `h2i_iut`
--
CREATE DATABASE IF NOT EXISTS `h2i_iut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `h2i_iut`;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `coursID` int(11) NOT NULL,
  `nomCours` varchar(255) NOT NULL,
  `fileURL` varchar(255) NOT NULL,
  `moduleIDC` int(11) NOT NULL,
  `auteurIDC` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`coursID`, `nomCours`, `fileURL`, `moduleIDC`, `auteurIDC`, `titre`) VALUES
(9, 'ergo.docx', 'uploads/ergo.docx', 4, 5, 'Cours de Debouté');

-- --------------------------------------------------------

--
-- Structure de la table `courstutorat`
--

CREATE TABLE `courstutorat` (
  `id` int(30) UNSIGNED NOT NULL,
  `nomModule` varchar(255) NOT NULL,
  `jour` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time NOT NULL,
  `tuteur` int(11) NOT NULL,
  `eleve1` int(11) NOT NULL,
  `eleve2` int(11) DEFAULT NULL,
  `eleve3` int(11) DEFAULT NULL,
  `eleve4` int(11) DEFAULT NULL,
  `salle` varchar(8) DEFAULT NULL,
  `commentaireTutorat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `courstutorat`
--

INSERT INTO `courstutorat` (`id`, `nomModule`, `jour`, `heureDebut`, `heureFin`, `tuteur`, `eleve1`, `eleve2`, `eleve3`, `eleve4`, `salle`, `commentaireTutorat`) VALUES
(1, 'Programmation C', '2016-12-23', '08:00:00', '10:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...'),
(2, 'BDA', '2016-12-19', '08:00:00', '09:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...'),
(3, 'BDA', '2016-12-19', '09:00:00', '10:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...'),
(4, 'BDA', '2016-12-20', '08:00:00', '09:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...'),
(5, 'Programmation C', '2016-12-28', '11:00:00', '13:00:00', 3, 2, 5, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...'),
(6, 'Programmation C', '2017-01-01', '08:00:00', '09:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'test pierre'),
(7, 'Programmation C', '2017-01-04', '08:00:00', '09:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'test pierre');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `auteurID` int(11) NOT NULL,
  `sujetID` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateMessage` datetime NOT NULL,
  `messageValide` tinyint(1) NOT NULL,
  `premierMessage` tinyint(1) NOT NULL,
  `modification` datetime DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`messageID`, `auteurID`, `sujetID`, `contenu`, `dateMessage`, `messageValide`, `premierMessage`, `modification`, `pseudo`) VALUES
(273, 1, 150, 'Message sujet 1', '2016-11-20 18:36:00', 0, 1, NULL, 'Laurent'),
(274, 1, 151, 'Message sujet 2', '2016-11-20 18:36:18', 0, 1, NULL, 'Antonin'),
(275, 1, 152, 'Message sujet 3', '2016-11-20 18:36:31', 0, 1, NULL, 'Pierre'),
(276, 1, 150, 'Réponse sujet 1', '2016-11-20 18:36:44', 0, 0, NULL, 'Adrien'),
(277, 1, 151, 'Réponse modifiée 3', '2016-11-20 18:36:59', 0, 0, '2016-11-20 18:46:14', 'Bastien'),
(278, 1, 152, 'Réponse modifiée 2', '2016-11-20 18:37:16', 0, 0, '2016-11-20 18:44:59', 'Sarah'),
(279, 1, 150, 'ZEFAZEF', '2016-11-20 18:43:55', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `moduleID` int(11) NOT NULL,
  `nomModule` varchar(255) NOT NULL,
  `semestre` int(11) NOT NULL,
  `enseignant` varchar(255) DEFAULT NULL,
  `tuteur` int(11) DEFAULT NULL,
  `nbEpingle` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`moduleID`, `nomModule`, `semestre`, `enseignant`, `tuteur`, `nbEpingle`, `image`) VALUES
(3, 'Probabilités et Statistiques', 3, 'Aude Joubert', NULL, 0, 'iconmaths'),
(4, 'Communication S1', 1, 'test', NULL, 1, 'iconcom'),
(5, 'Programmation C', 1, 'test', 3, 0, 'iconc'),
(6, 'Programmation Java', 2, NULL, NULL, 0, 'iconjava'),
(7, 'Communication S2', 2, NULL, NULL, 0, 'iconcom'),
(8, 'Communication S3', 3, NULL, NULL, 0, 'iconcom'),
(9, 'Communication S4', 4, NULL, NULL, 0, 'iconcom'),
(11, 'Algo avancé', 4, NULL, NULL, 0, 'iconalgo'),
(12, 'Windows', 1, NULL, NULL, 0, 'iconwindows'),
(14, 'Linux', 1, NULL, NULL, 0, 'iconlinux'),
(16, 'SQL', 1, NULL, NULL, 0, 'iconsql'),
(17, 'Web', 1, NULL, NULL, 0, 'iconweb');

-- --------------------------------------------------------

--
-- Structure de la table `planningtutorat`
--

CREATE TABLE `planningtutorat` (
  `annee` int(4) NOT NULL,
  `numeroSemaine` int(2) UNSIGNED NOT NULL,
  `heurePlanning` int(4) NOT NULL,
  `lundi` int(30) UNSIGNED DEFAULT NULL,
  `mardi` int(30) UNSIGNED DEFAULT NULL,
  `mercredi` int(30) UNSIGNED DEFAULT NULL,
  `jeudi` int(30) UNSIGNED DEFAULT NULL,
  `vendredi` int(30) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `planningtutorat`
--

INSERT INTO `planningtutorat` (`annee`, `numeroSemaine`, `heurePlanning`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`) VALUES
(2016, 51, 8, 2, 4, NULL, NULL, 1),
(2016, 51, 9, 3, NULL, NULL, NULL, 1),
(2016, 51, 10, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 11, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 12, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 13, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 14, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 15, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 16, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 17, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 18, NULL, NULL, NULL, NULL, NULL),
(2016, 51, 19, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 8, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 9, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 10, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 11, NULL, NULL, 5, NULL, NULL),
(2016, 52, 12, NULL, NULL, 5, NULL, NULL),
(2016, 52, 13, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 14, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 15, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 16, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 17, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 18, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 8, NULL, NULL, 7, NULL, NULL),
(2017, 1, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 1, 19, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 2, 19, NULL, NULL, NULL, NULL, NULL),
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
(2017, 52, 19, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `sujetID` int(11) NOT NULL,
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
  `dateDernierChangement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`sujetID`, `nom`, `auteurID`, `moduleID`, `message`, `dateSujet`, `epingle`, `clos`, `messageValide`, `nbVues`, `nbRep`, `priority`, `dernierMessage`, `pseudo`, `dateDernierChangement`) VALUES
(150, 'Sujet 1', 1, 4, 'Message sujet 1', '2016-11-20 18:36:00', 0, 0, NULL, 7, 3, 2, 279, 'Laurent', '2016-11-20 18:43:55'),
(151, 'Sujet 2 ', 1, 4, 'Message sujet 2', '2016-11-20 18:36:18', 0, 0, NULL, 18, 2, 1, 277, 'Antonin', '2016-11-20 18:46:14'),
(152, 'Sujet 3 ', 1, 4, 'Message sujet 3', '2016-11-20 18:36:31', 1, 0, NULL, 27, 2, 2, 278, 'Pierre', '2016-11-20 18:46:05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `utilisateurID` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurID`, `identifiant`, `motDePasse`, `prenom`, `pseudo`, `statut`) VALUES
(1, 'p1505454', 'IUTinformatique69', 'Laurent', 'Laurent', 'Tuteur'),
(2, 'p1501019', 'test', 'Antonin', 'Antonin', 'Admin'),
(3, 'p1506593', 'test', 'Maxime', 'Maxime', 'Superuser'),
(4, 'p1506391', 'test', 'Mihajlo', 'Miki', 'Enseignant'),
(5, 'p1501615', 'test', 'Pierre', 'Duc', 'Admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`coursID`),
  ADD KEY `fk_utilisateurs` (`auteurIDC`) USING BTREE,
  ADD KEY `fk_module` (`moduleIDC`) USING BTREE;

--
-- Index pour la table `courstutorat`
--
ALTER TABLE `courstutorat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleve1` (`eleve1`),
  ADD KEY `eleve2` (`eleve2`),
  ADD KEY `eleve3` (`eleve3`),
  ADD KEY `eleve4` (`eleve4`),
  ADD KEY `nomModule` (`nomModule`),
  ADD KEY `tuteur` (`tuteur`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `sujetID` (`sujetID`),
  ADD KEY `auteurID` (`auteurID`),
  ADD KEY `sujetID_2` (`sujetID`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`),
  ADD KEY `enseignant` (`enseignant`),
  ADD KEY `tuteur` (`tuteur`);

--
-- Index pour la table `planningtutorat`
--
ALTER TABLE `planningtutorat`
  ADD KEY `lundi` (`lundi`),
  ADD KEY `mardi` (`mardi`),
  ADD KEY `mercredi` (`mercredi`),
  ADD KEY `jeudi` (`jeudi`),
  ADD KEY `vendredi` (`vendredi`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`sujetID`),
  ADD KEY `sujetID` (`sujetID`),
  ADD KEY `auteurID` (`auteurID`),
  ADD KEY `moduleID` (`moduleID`),
  ADD KEY `dernierMessage` (`dernierMessage`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`utilisateurID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `coursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `courstutorat`
--
ALTER TABLE `courstutorat`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `sujetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_module_moduleID` FOREIGN KEY (`moduleIDC`) REFERENCES `module` (`moduleID`),
  ADD CONSTRAINT `fk_utilisateurs_utilisateurID` FOREIGN KEY (`auteurIDC`) REFERENCES `utilisateurs` (`utilisateurID`);

--
-- Contraintes pour la table `courstutorat`
--
ALTER TABLE `courstutorat`
  ADD CONSTRAINT `fk_eleve1_utilisateurs` FOREIGN KEY (`eleve1`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve2_utilisateurs` FOREIGN KEY (`eleve2`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve3_utilisateurs` FOREIGN KEY (`eleve3`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eleve4_utilisateurs` FOREIGN KEY (`eleve4`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tuteur_utilisateurs` FOREIGN KEY (`tuteur`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_auteurmessageid` FOREIGN KEY (`auteurID`) REFERENCES `utilisateurs` (`utilisateurID`),
  ADD CONSTRAINT `fk_sujetid` FOREIGN KEY (`sujetID`) REFERENCES `sujet` (`sujetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_tuteur` FOREIGN KEY (`tuteur`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `planningtutorat`
--
ALTER TABLE `planningtutorat`
  ADD CONSTRAINT `fk_jeudi_courstutorat` FOREIGN KEY (`jeudi`) REFERENCES `courstutorat` (`id`),
  ADD CONSTRAINT `fk_lundi_courstutorat` FOREIGN KEY (`lundi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mardi_courstutorat` FOREIGN KEY (`mardi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mercredi_courstutorat` FOREIGN KEY (`mercredi`) REFERENCES `courstutorat` (`id`),
  ADD CONSTRAINT `fk_vendredi_courstutorat` FOREIGN KEY (`vendredi`) REFERENCES `courstutorat` (`id`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fk_auteurid` FOREIGN KEY (`auteurID`) REFERENCES `utilisateurs` (`utilisateurID`),
  ADD CONSTRAINT `fk_derniermessage` FOREIGN KEY (`dernierMessage`) REFERENCES `message` (`messageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_moduleid` FOREIGN KEY (`moduleID`) REFERENCES `module` (`moduleID`);
--
-- Base de données :  `p1501615`
--
CREATE DATABASE IF NOT EXISTS `p1501615` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `p1501615`;

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `NumActeur` mediumint(8) UNSIGNED NOT NULL,
  `NumPersonne` mediumint(8) UNSIGNED DEFAULT NULL,
  `Agent` mediumint(8) UNSIGNED DEFAULT NULL,
  `Specialite` tinyint(3) UNSIGNED DEFAULT NULL,
  `Taille` tinyint(3) UNSIGNED DEFAULT NULL,
  `Poids` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`NumActeur`, `NumPersonne`, `Agent`, `Specialite`, `Taille`, `Poids`) VALUES
(1, 1, 2, 1, 172, 75),
(2, 3, 6, 5, 175, 80),
(3, 5, 4, 9, 192, 72),
(4, 7, 10, 7, 172, 69),
(5, 9, 10, 6, 175, 95),
(6, 11, 10, 4, 192, 95),
(7, 12, 8, 2, 176, 98);

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `numcinema` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `Compagnie` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cinema`
--

INSERT INTO `cinema` (`numcinema`, `nom`, `adresse`, `cp`, `ville`, `telephone`, `Compagnie`) VALUES
(1, 'ABC ? Bourg-en-Bresse', '28, boulevard Voltaire', '1000', 'Bourg en bressa', '474210695', 'ABC'),
(2, 'ABC ? Dijon', '7, rue Chapeau-Rouge ', '21000', 'Dijon', '380305566', 'ABC'),
(3, 'Cin?ma ABC ? Chartres', '10, avenue Jehan-de-Beauce ', '28000', 'Chartres', '237361467', 'ABC'),
(4, 'ABC ? Toulouse', '13, rue Saint-Bernard ', '31000', 'Toulouse', '561298100', 'ABC'),
(5, 'ABC ? Cahors', '24, rue des Augustins ', '46000', 'Cahors', '565350311', 'ABC'),
(6, 'Mega CGR ? Narbonne', 'ZI Croix du Sud, Route de perpignan ', '11100', 'Narbonne', '892680445', 'CGR'),
(7, 'CGR Olympia ? La Rochelle', '54, rue Chaudrier ', '17000', 'La Rochelle', '836687025', 'CGR'),
(8, 'M?ga CGR ? Bourges', 'ZAC du Prado, rue de lAvenir ', '18000', 'Bourges', '892688588', 'CGR'),
(9, 'M?ga CGR ? Brive-La-Gaillarde', 'Avenue Kennedy ', '19100', 'Brive-La-Gaillarde', '836680445', 'CGR'),
(10, 'CGR Le Fran?ais ? Bordeaux', '6, rue F?nelon ', '33000', 'Bordeaux', '556441187', 'CGR'),
(11, 'Mega CGR 2 Lions ? Tours', 'Avenue Marcel-M?rieux, quart. des 2 Lions ', '37000', 'Tours', '892688588', 'CGR'),
(12, 'M?ga CGR Centre ? Tours', '4, Place Fran?ois-Truffaut ', '37000', 'Tours', '892680445', 'CGR'),
(13, 'Mega CGR ? Cherbourg', 'Boulevard F?lix Amiot ', '50100', 'Cherbourg', '892680445', 'CGR'),
(14, 'CGR Saint-Louis ? Pau', '11, rue du Mar?chal-Joffre ', '64000', 'Pau', '892688588', 'CGR'),
(15, 'Mega CGR ? Pau', 'Place du 7e art ', '64000', 'Pau', '892688588', 'CGR'),
(16, 'M?ga CGR ? Tarbes', '91, rue du Mar?chal Foch ', '65000', 'Tarbes', '562343868', 'CGR'),
(17, 'CGR Le Colis?e ? Le Mans', '11, rue du Port ', '72000', 'Le Mans', '836680125', 'CGR'),
(18, 'CGR Donjon ? Niort', 'Rue Victor Hugo ', '79000', 'Niort', '549285048', 'CGR'),
(19, 'CGR Rex ? Niort', '7, avenue de la R?publique ', '79000', 'Niort', '836680445', 'CGR'),
(20, 'CGR Le Castille ? Poitiers', '24, place du Mar?chal Leclerc ', '86000', 'Poitiers', '836687023', 'CGR'),
(21, 'CNP Terreaux ? Lyon', '40, rue du Pr?sident Edouard Herriot ', '69001', 'Lyon', '836686933', 'CNP'),
(22, 'CNP Bellecour ? Lyon', '12, rue de la Barre ', '69002', 'Lyon', '836686933', 'CNP'),
(23, 'CNP Od?on ? Lyon', '6, rue Grol?e ', '69002', 'Lyon', '836686933', 'CNP'),
(24, 'l Eden ? Saint Cast le Guildo', 'Rue Vall?e Besnault ', '22380', 'Saint Cast le Guildo', '296419594', 'EDEN'),
(25, 'Eden ? La Souterraine', '27, rue Lavaud ', '23300', 'La Souterraine', '555637163', 'EDEN'),
(26, 'Eden ? La Souterraine', '27, rue Lavaud ', '23300', 'La Souterraine', '555637163', 'EDEN'),
(27, 'Eden-Palace ? Argenton-sur-Creuse', '8, rue Barb?s ', '36200', 'Argenton-sur-Creuse', '254244979', 'EDEN'),
(28, 'Eden ? Cosne sur Loire', '2, rue Saint-Agnan ', '58200', 'Cosne-sur-Loire', '386282515', 'EDEN'),
(29, 'Gaumont Rennes ? Rennes', '8, quai Duguay-Trouin ', '35000', 'Rennes', '836687555', 'GAUMONT'),
(30, 'Gaumont Vari?t', '34, boulevard du Mar?chal Foch ', '49000', 'Angers', '836687555', 'GAUMONT'),
(31, 'Gaumont Champs Elys?es ? Paris', '27, avenue des Champs-Elys?es ', '75008', 'Paris', '892696696', 'GAUMONT'),
(32, 'Gaumont Champs Elys?es ? Paris', '50, avenue des Champs-Elys?es ', '75008', 'Paris', '892696696', 'GAUMONT'),
(33, 'Gaumont Op?ra Fran?ais ? Paris', '38, boulevard des Italiens ', '75009', 'Paris', '892696696', 'GAUMONT'),
(34, 'Gaumont Rouen ? Rouen', '28, rue de la R?publique ', '76000', 'Rouen', '836687555', 'GAUMONT'),
(35, 'Gaumont Grand-Quevilly ? Grand Quevilly', '26, boulevard Pierre Brossolette ', '76120', 'Grand-Quevilly', '892696696', 'GAUMONT'),
(36, 'Gaumont Amiens', 'Au pied de la Tour Perret 5 boulevard de Belfort ', '80000', 'Amiens', 'NULL', 'GAUMONT'),
(37, 'Gaumont Paris ? Amiens', '42, rue des Trois Cailloux ', '80000', 'Amiens', 'NULL', 'GAUMONT'),
(38, 'Gaumont Picardy ? Amiens', '10, rue Ernest Cauvin ', '80000', 'Amiens', 'NULL', 'GAUMONT'),
(39, 'MK2 Hautefeuille ? Paris', '7, rue Hautefeuille ', '75006', 'Paris', '892698484', 'MK2'),
(40, 'MK2 Od?on ? Paris', '113, boulevard Saint Germain ', '75006', 'Paris', '892698484', 'MK2'),
(41, 'MK2 Parnasse ? Paris', '11, rue Jules Chaplain ', '75006', 'Paris', '892698484', 'MK2'),
(42, 'La Nef ? Grenoble', '18, bd Edouard Rey ', '38000', 'Grenoble', '476465325', 'NEF'),
(43, 'Les 8 Nef ? Lyon', '20, rue Thomassin ', '69002', 'Lyon', '892680029', 'NEF'),
(44, 'Cin?ma les Nef Chamnord ? Chamb?ry', 'Centre commercial Chamnord ', '73000', 'Chamb?ry', '836680749', 'NEF'),
(45, 'Path?-Madeleine ? Marseille', '36, avenue du Mar?chal-Foch ', '13004', 'Marseille', '892696696', 'PATHE'),
(46, 'Path?-Lumi?re ? Caen', '17, bd du Mar?chal-Leclerc ', '14000', 'Caen', '836682288', 'PATHE'),
(47, 'Path? Orl?ans ? Orl?ans', '45, rue des Halles ', '45000', 'Orl?ans', '238620088', 'PATHE'),
(48, 'Path? Cap Sud ? Avignon', '175, rue Pierre Seghers ', '84085', 'Avignon', '436682288', 'PATHE'),
(49, 'Path? ? Boulogne Billancourt', '26, rue Le Corbusier ', '92100', 'Boulogne-Billancourt', '892696696', 'PATHE'),
(50, 'Path? Belle-Epine ? Thiais', 'Centre commercial Belle-Epine ', '94320', 'Thiais', '892696696', 'PATHE'),
(51, 'UGC Capitole ? Marseille', '134, la Canebi?re ', '13001', 'Marseille', '892700000', 'UGC'),
(52, 'UGC Cin? Cit? ? Mondeville', 'Centre commercial Mondeville 2 ', '14120', 'Mondeville', '892700000', 'UGC'),
(53, 'UGC ? Orl?ans', 'Centre commercial Place dArc ', '45000', 'Orl?ans', '892700000', 'UGC'),
(54, 'UGC Saint-Jean ? Nancy', '54, rue Saint-Jean ', '54000', 'Nancy', '892700000', 'UGC'),
(55, 'UGC Cin? Cit? ? Lille', '40, rue de B?thune ', '59000', 'Lille', '892700000', 'UGC'),
(56, 'UGC Part Dieu ? Lyon', 'Centre commercial La Part-Dieu ', '69003', 'Lyon', '892700000', 'UGC'),
(57, 'UGC Astoria ? Lyon', '31, cours Vitton ', '69006', 'Lyon', '892700000', 'UGC'),
(58, 'UGC Cin? Cit? ? Lyon', '60, quai Charles de Gaulle ', '69006', 'Lyon', '892700000', 'UGC'),
(59, 'UGC Cin? Cit? ? Rouen', 'Centre commercial Saint Sever ', '76000', 'Rouen', '235735823', 'UGC'),
(60, 'UGC Rosny ? Rosny sous Bois', '16, rue Conrad Adenauer, cc ', '93110', 'Rosny sous Bois', '892700000', 'UGC'),
(61, 'UGC ? Cr?teil', 'Centre commercial Cr?teil-Soleil ', '94000', 'Cr?teil', '892700000', 'UGC'),
(62, 'UGC Cergy Pr?fecture ? Cergy', 'Centre commercial de la pr?fecture ', '95000', 'Cergy', '892700000', 'UGC'),
(63, 'Eden ? Bourg-en-Bresse', '43 av. Alsace-Lorraine ', '1000', 'Bourg-en-Bresse', '474224825', NULL),
(64, 'La Grenette ? Bourg-en-Bresse', 'Cour-de-Verdun ', '1000', 'Bourg-en-Bresse', '474224825', NULL),
(65, 'Les Clubs ? Villers-Cotter?ts', '12, place Aristide-Briand ', '2600', 'Villers-Cotter?ts', '836680114', NULL),
(66, 'Casino ? Tergnier', '7, rue Marceau ', '2700', 'Tergnier', '323577301', NULL),
(67, 'Cin?ma Elys?e Palace ? Vichy', 'Centre commercial Les quatre chemins ', '3200', 'Vichy', '892681328', NULL),
(68, 'Cin?ma Ren? Fallet ? Dompierre sur Besbre', 'Route de Vichy ', '3290', 'Dompierre sur Besbre', '470345956', NULL),
(69, 'Cin? Ubaye ? Barcelonnette', 'Rue Henri Mercier ', '4400', 'Barcelonnette', '492813726', NULL),
(70, 'Le F?librige ? Gr?oux', 'BP 57 (Hotel de Ville) ', '4800', 'Gr?oux', '492781325', NULL),
(71, 'Cin?ma Vauban ? Brian?on', 'Avenue de la R?publique ', '5100', 'Brian?on', '836686330', NULL),
(72, 'Cin?ma Le Roc ? Embrun', 'bd Pasteur ', '5200', 'Embrun', '492431957', NULL),
(73, 'Les Nacelles ? Annonay', 'Avenue de lEurope ', '7100', 'Annonay', '475334821', NULL),
(74, 'Vox ? Le Cheylard', '11, av. Jagornac ', '7160', 'Le Cheylard', '475291607', NULL),
(75, 'Les Tourelles ? Vouziers', '33, rue Gambetta ', '8400', 'Vouziers', '324719471', NULL),
(76, 'Le Rex ? Foix', 'Place du 8 mai 1945 ', '9000', 'Foix', '561054646', NULL),
(77, 'Les toiles du Rex ? Pamiers', 'Place St. Ursule ', '9100', 'Pamiers', '561606812', NULL),
(78, 'R?gie culturelle ? Tarascon-sur-Ari?ge', 'Centre multim?dia ', '9400', 'Tarascon-sur-Ari?ge', '534098650', NULL),
(79, 'Cin? City ? Troyes', '14, rue du Bas-Tr?vois ', '10000', 'Troyes', '325460066', NULL),
(80, 'Cin?ma Eden ? Romilly sur Seine', '66, rue Gambetta ', '10100', 'Romilly sur Seine', '325244117', NULL),
(81, 'Le Casino ? Antibes', '6, av. du 24-Ao?t ', '10660', '0 Antibes', '836687012', NULL),
(82, 'La Coupole ? La Gaude', 'Quai Sainte-Appollonie ', '10661', '0 La Gaude', '493244981', NULL),
(83, 'Cin?ma Espace Centre ? Cagnes-sur-Mer', '5, av. de Verdun ', '10680', '0 Cagnes-sur-Mer', '493206164', NULL),
(84, 'Colis?e ? Carcassonne', '10 bd Omer Sarraut ', '11000', 'Carcassonne', '468250809', NULL),
(85, 'l Odeum ? Carcassonne', '64, rue Antoine-Marty ', '11000', 'Carcassonne', '468259777', NULL),
(86, 'Le Club ? Rodez', '37, av. Tarayre ', '12000', 'Rodez', '565670967', NULL),
(87, 'Le Family ? Rodez', 'Passage des Ma?ons ', '12000', 'Rodez', '565680140', NULL),
(88, 'Le Royal ? Rodez', '15, bd Belle-Isle ', '12000', 'Rodez', '565426106', NULL),
(89, 'Les Lumi?res de la ville ? Millau', NULL, '12100', 'Millau', '892680128', NULL),
(90, 'Vari?t?s ? Marseille', '37, rue Vincent-Scotto (angle Canebi?re) ', '13001', 'Marseille', '496116161', NULL),
(91, 'Cin?ma le Prado ? Marseille', '36, av. du Prado ', '13006', 'Marseille', '836680043', NULL),
(92, 'Lux ? Caen', '6, avenue Sainte-Th?r?se ', '14000', 'Caen', '892680043', NULL),
(93, 'Le Royal ? Lisieux', '12, rue du 11-Novembre ', '14100', 'Lisieux', '231620007', NULL),
(94, 'Majestic ? Lisieux', '7, rue Auchard ', '14100', 'Lisieux', '231623908', NULL),
(95, 'Le Normandy ? Aurillac', '17, rue des Carmes ', '15000', 'Aurillac', '471635555', NULL),
(96, 'Cin?ma Delta ? Saint Flour', '17, bis Place darmes ', '15100', 'Saint Flour', '471607500', NULL),
(97, 'Cin?ma La Source ? Chaudes-Aigues', '29, rue Saint Julien ', '15110', 'Chaudes-Aigues', '471235679', NULL),
(98, 'l Arverne ? Murat', '18, avenue Hector Peschaud ', '15300', 'Murat', '836680591', NULL),
(99, 'CNBDI (salle Nemo) ? Angoul?me', '60, av. de Cognac ', '16000', 'Angoul?me', '545921006', NULL),
(100, 'Mega CGR ? Angoul?me', '30, rue Saint-Roch ', '16000', 'Angoul?me', '836680445', NULL),
(101, 'Cin?movida ? Cognac', '57, av. Victor-Hugo ', '16100', 'Cognac', '836680445', NULL),
(102, 'Dragon ? La Rochelle', 'sur le port ', '17000', 'La Rochelle', '546412267', NULL),
(103, 'Dragon-Plus ? La Rochelle', 'Rue L?once-Vieljeux ', '17000', 'La Rochelle', '546412267', NULL),
(104, 'Atomic Cin?ma ? Aubigny sur Nere', '23, rue Prieur', '18700', 'Aubigny sur Nere', '248580095', NULL),
(105, 'Rex ? Brive-la-Gaillarde', '3, bd du G?n?ral-Koenig ', '19100', 'Brive-la-Gaillarde', '836680043', NULL),
(106, 'Le 7e Art ? Bort-les-Orgues', 'Place Marmontel ', '19110', 'Bort-les-Orgues', '555960488', NULL),
(107, 'Le Carnot ? Ussel', '66 bis av. Carnot ', '19200', 'Ussel', '555721128', NULL),
(108, 'l Esplanade ? Egletons', 'Esplanade Charles-Spinasse ', '19300', 'Egletons', '555931439', NULL),
(109, 'Le Turenne ? Argentat', 'Avenue Poincar', '19400', 'Argentat', '555281839', NULL),
(110, 'Le Studio ? Bastia', '1, rue de la Mis?ricorde ', '20200', 'Bastia', '495319295', NULL),
(111, 'R?gent Cin?ma ? Bastia', '5ter, rue C?sar-Campinchi ', '20200', 'Bastia', '495313031', NULL),
(112, 'Cin?ma 7?me Art ? Furiani', 'Route du village ', '20600', 'Furiani', '495319295', NULL),
(113, 'Club 6 ? Saint-Brieuc', '40, bd Clemenceau ', '22000', 'Saint-Brieuc', '296338325', NULL),
(114, 'Vers le large ? Dinan', '4, route de Dinan ', '22100', 'Dinan', '836686926', NULL),
(115, 'Les Baladins ? Guingamp', '6, rue Saint-Nicolas ', '22200', 'Guingamp', '296437307', NULL),
(116, 'Les Baladins ? Lannion', '34, avenue du G?n?ral-de-Gaulle ', '22300', 'Lannion', '296910529', NULL),
(117, 'Le Douron ? Plestin-les-Gr?ves', 'Place de Launceston ', '22310', 'Plestin-les-Gr?ves', '296356141', NULL),
(118, 'Cin?ma Le R?gent', 'Place du Mail ', '23400', 'Bourganeuf', '555640226', NULL),
(119, 'Cin?ma Le R?gent', 'Place du Mail ', '23400', 'Bourganeuf', '555640226', NULL),
(120, 'Grand Ecran ? Bergerac', 'Place de la R?publique ', '24100', 'Bergerac', '892686832', NULL),
(121, 'La Fabrique ? Saint-Astier', 'Rue Amiral-Courbet-Bp 39 ', '24110', 'Saint-Astier', '553024199', NULL),
(122, 'Cin? Roc ? Terrasson', '16, Avenue Jean Jaur?s ', '24120', 'Terrasson-La-Villedieu', '892680587', NULL),
(123, 'Rex ? Sarlat', '18, avenue Thiers ', '24200', 'Sarlat', '836686924', NULL),
(124, 'Le Studio ? Saint Aulaye', 'Rue Docteur Lacroix ', '24410', 'Saint Aulaye', '553908073', NULL),
(125, 'l Olympia ? Pontarlier', '1, rue Gambetta ', '25300', 'Pontarlier', '381391763', NULL),
(126, 'Cin?ma de Charmoille', 'Rue du Conot ', '25380', 'Charmoille', '381443909', NULL),
(127, 'Megarama Lumina', '12, boulevard Moise Foglia - Espace Lumi?re - ', '25400', 'Audincourt', '892681125', NULL),
(128, 'Cin? Plan?te ? Romans-sur-Is?re', '14, Place Jean Jaur?s ', '26100', 'Romans-sur-Is?re', '475023525', NULL),
(129, 'Cin?mas Palace ? Mont?limar', '16 Boulevard du pecher ', '26200', 'Mont?limar', '475018213', NULL),
(130, 'Les 7 Nefs ? Mont?limar', '17, bd Aristide-Briand ', '26200', 'Mont?limar', '475519500', NULL),
(131, 'Le Royal ? Pont Audemer', '16, rue Gen?ral Leclerc ', '27500', 'Pont Audemer', '892680342', NULL),
(132, 'Le Lido ? Gaillon', '3, rue Yves Montand ', '27600', 'Gaillon', '232526649', NULL),
(133, 'Palace ? Les Andelys', '19, rue Sellenick ', '27700', 'Les Andelys', '836686929', NULL),
(134, 'Delta ? Dreux', '5 rue du Commandant-Beaurepaire ', '28100', 'Dreux', '237467102', NULL),
(135, 'Espace Aragon ? Villard-Bonnot', '19, boulevard Jules Ferry ', '28190', 'Villard-Bonnot', '476712251', NULL),
(136, 'Le Dunois ? Ch?teaudun', '23, rue Lambert-Licors ', '28200', 'Ch?teaudun', '237456963', NULL),
(137, 'Le Rex ? Nogent-le-Rotrou', '26, place Saint-Pol ', '28400', 'Nogent-le-Rotrou', '237521224', NULL),
(138, 'Le Goyen ? Audierne', '13, rue Louis Pasteur ', '29770', 'Audierne', '298702230', NULL),
(139, 'Le Rohan ? Landerneau', '55, rue de la Fontaine-Blanche ', '29800', 'Landerneau', '298213311', NULL),
(140, 'Le Celtic ? Concarneau', 'Rue Amiral Courbet ', '29900', 'Concarneau', '836688112', NULL),
(141, 'Cin?marine ? Benodet', 'Avenue de la Plage ', '29950', 'Benodet', '298662015', NULL),
(142, 'Cin?ma Marcel Pagnol ? Aigues-Mortes', '9, rue Victor-Hugo ', '30220', 'Aigues-Mortes', '466537499', NULL),
(143, 'Le Capitole ? Uz', '11, rue Xavier-Sigalon ', '30700', 'Uz', '466221391', NULL),
(144, 'Cin?ma le Crat?re ? Toulouse', '95, Grand-Rue-Saint-Michel ', '31000', 'Toulouse', '562279110', NULL),
(145, 'Cin?math?que ? Toulouse', '69, rue du Taur ', '31000', 'Toulouse', '562303010', NULL),
(146, 'Cin? 32 Alsace ? Auch', '17, rue Lafayette ', '32007', 'Auch', '562606111', NULL),
(147, 'Cin? 32 Lafayette ? Auch', '17, rue Lafayette ', '32007', 'Auch', '562606111', NULL),
(148, 'Cin? 32 Gascogne ? Condom', '24 rue Jean-Jaur?s ', '32100', 'Condom', '562280080', NULL),
(149, 'Centre Jean-Vigo ? Bordeaux', '6, rue Franklin ', '33000', 'Bordeaux', 'NULL', NULL),
(150, 'Diagonal-Campus ? Montpellier', '5, avenue du Docteur-Pezet ', '34000', 'Montpellier', '467929181', NULL),
(151, 'Diagonal-Capitole ? Montpellier', '5, rue de Verdun ', '34000', 'Montpellier', '467929181', NULL),
(152, 'Diagonal-Celleneuve ? Montpellier', 'Place Pierre-Renaudel ', '34000', 'Montpellier', '467929181', NULL),
(153, 'Diagonal-Centre ? Montpellier', '18, place Saint-Denis ', '34000', 'Montpellier', '467929181', NULL),
(154, 'Cin?-TNB ? Rennes', '1, rue Saint-H?lier ', '35000', 'Rennes', '836680039', NULL),
(155, 'Cin?ma Arvor ? Rennes', '29, rue dAntrain ', '35000', 'Rennes', '299387240', NULL),
(156, 'Cin?ville ? Rennes', 'Place du Colombier ', '35000', 'Rennes', '223448400', NULL),
(157, 'Apollo ? Ch?tauroux', '4, rue Albert-1er ', '36000', 'Ch?teauroux', '254601875', NULL),
(158, 'Cin?ma Les Elys?es ? Issoudun', 'Boulevard Roosevelt ', '36100', 'Issoudun', '254033263', NULL),
(159, 'Studio ? Tours', '2, rue des Ursulines ', '37000', 'Tours', '836683701', NULL),
(160, 'Cin?math?que de Grenoble ? Grenoble', '4, rue Hector-Berlioz ', '38000', 'Grenoble', '476544351', NULL),
(161, 'Le Club ? Grenoble', '9bis, rue du Phalanst?re ', '38000', 'Grenoble', '836682288', NULL),
(162, 'Le M?li?s ? Grenoble', '3, rue de Strasbourg ', '38000', 'Grenoble', '476472433', NULL),
(163, 'Le Palace ? Lons-le-Saunier', '9, rue Pasteur ', '39000', 'Lons-le-Saunier', '384240529', NULL),
(164, 'R?gent ? Lons-le-Saunier', 'Place de la Chevalerie ', '39000', 'Lons-le-Saunier', '384240628', NULL),
(165, 'Cin?ma Studio MJC ? Dole', '21, Place Barberousse ', '39100', 'Dole', '384825040', NULL),
(166, 'Les Tanneurs ? D', '12, rue du 21 janvier ', '39100', 'D', '384720135', NULL),
(167, 'Cin?ma de la Maison du Peuple ? Saint-Claude', '12, rue de lApoyat ', '39200', 'Saint-Claude', '384450721', NULL),
(168, 'Le Royal ? Mont-de-Marsan', '11, rue du Mar?chal-Bosquet ', '40000', 'Mont-de-Marsan', '558063452', NULL),
(169, 'Cap Cin? ? Blois', '11, rue des Arpents ', '41000', 'Blois', '254905350', NULL),
(170, 'Les Lobis ? Blois', '12, avenue du Mar?chal-Maunoury ', '41000', 'Blois', '254743322', NULL),
(171, 'Le Ronsard ? Vend', '59 rue du Faubourg-Chartrain ', '41100', 'Vend', '254802348', NULL),
(172, 'Le France ? Saint-Etienne', '8, rue de la Valse ', '42000', 'Saint-Etienne', '477327171', NULL),
(173, 'Le M?li?s ? Saint-Etienne', '10 Places Jean Jaur?s ', '42000', 'Saint-Etienne', '477326347', NULL),
(174, 'Le Royal ? Saint-Etienne', '33, avenue de la Lib?ration ', '42000', 'Saint-Etienne', '477328888', NULL),
(175, 'Cin?-France ? Le Puy-en-Velay', '8, rue Vibert ', '43000', 'Le Puy-en-Velay', '471093684', NULL),
(176, 'Le Family ? Le Puy-en-Velay', '29, place Breuil ', '43000', 'Le Puy-en-Velay', '471090035', NULL),
(177, 'Katorza ? Nantes', '3, rue Corneille ', '44000', 'Nantes', '836657012', NULL),
(178, 'Le Cinematographe ? Nantes', '12bis, rue des Carmelites ', '44000', 'Nantes', '240479480', NULL),
(179, 'Le Concorde ? Nantes', '79, boulevard de lEgalit', '44000', 'Nantes', '240585744', NULL),
(180, 'Les Carmes ? Orl?ans', '7, rue des Carmes ', '45000', 'Orl?ans', '238620296', NULL),
(181, 'S?lect-Studios ? Orl?ans', '45, rue Jeanne dArc ', '45000', 'Orl?ans', '238620088', NULL),
(182, 'Comoedia ? Marmande', '30, rue L?opold-Faye ', '47200', 'Marmande', '553642132', NULL),
(183, 'Plaza ? Marmande', 'Boulevard de Mar', '47200', 'Marmande', '553209512', NULL),
(184, 'Trianon ? Mende', 'Boulevard Lucien Arnault ', '48000', 'Mende', '836680174', NULL),
(185, 'Le Rex ? Saint Ch?ly d Apcher', '130, Avenue Th?ophile Roussel ', '48200', 'Saint Ch?ly d Apcher', '466310699', NULL),
(186, 'Maison Richard ? Nasbinals', NULL, '48260', 'Nasbinals', 'NULL', NULL),
(187, 'Les 400 Coups', '12, rue Claveau ', '49000', 'Angers', '241887095', NULL),
(188, 'Multiplexe Gaumont', '1, avenue des Droits de lHomme ', '49000', 'Angers', '892696696', NULL),
(189, 'Le Rex', '37, rue des Vieux Greniers ', '49300', 'Cholet', '241582000', NULL),
(190, 'Le Palace ', '13, quai Carnot ', '49400', 'Saumur', '241512706', NULL),
(191, 'Drakkar ? Saint L', '29, rue Alsace Lorraine ', '50000', 'Saint L', '892680131', NULL),
(192, 'Majestic ? Saint L', '25, rue Torteron ', '50000', 'Saint L', '833051660', NULL),
(193, 'Club 6 ? Cherbourg', '20, rue de la Paix ', '50100', 'Cherbourg', '836686910', NULL),
(194, 'Le Palace ? Equeurdreville-Hainneville', 'Rue des R?sistants ', '50120', 'Equeurdreville-Hainneville', '233789649', NULL),
(195, 'Cin?mas Vox-Eden ? Chaumont', '4, ruelle Lardi?re ', '52000', 'Chaumont', '325010000', NULL),
(196, 'Le Cyrano ? Saint-Dizier', 'NULL', '52100', 'Saint-Dizier', '325050325', NULL),
(197, 'Le Vox ? Langres', '15, Rue Grand Bie ', '52200', 'Langres', '325885517', NULL),
(198, 'Cin?ville ? Laval', '25 quai Gambetta ', '53000', 'Laval', '243599393', NULL),
(199, 'Vox ? Renaz', '30, rue Victor-Fourcault ', '53800', 'Renaz', '243064059', NULL),
(200, 'Cam?o Commanderie ? Nancy', '16, rue de la Commanderie ', '54000', 'Nancy', '892680029', NULL),
(201, 'Cam?o Saint-S?bastien ? Nancy', '6, rue L?opold-Lallement ', '54000', 'Nancy', '892680029', NULL),
(202, 'Kinepolis ? Nancy', '3, rue victor ', '54000', 'Nancy', '892687570', NULL),
(203, 'Le Colis?e 2 ? Bar le Duc', '15, rue Notre Dame ', '55000', 'Bar le Duc', '329790506', NULL),
(204, 'Cin?ma Majestic ? Verdun ', '12, place Chevert ', '55100', 'Verdun', '892680071', NULL),
(205, 'Garenne ? Vannes', '12 bis rue A. Le Pontois ', '56000', 'Vannes', '297424810', NULL),
(206, 'Cin?ville ? Lorient', '4, boulevard Joffre ', '56100', 'Lorient', '297647800', NULL),
(207, 'Le Jeanne d Arc ? Gourin', '19 rue Hugo Derville ', '56110', 'Gourin', '297235042', NULL),
(208, 'Cam?o-Ariel ? Metz', '24, rue du Palais ', '57000', 'Metz', '387189995', NULL),
(209, 'Cin?ma Palace ? Metz', '5-7, rue Fabert ', '57000', 'Metz', '836680587', NULL),
(210, 'Kin?polis St Julien Les Metz', '10 avenue Paul Langevin ', '57070', 'St Julien Les Metz', '387758450', NULL),
(211, 'Le Mazarin ? Nevers', '3bis, rue Passi?re ', '58000', 'Nevers', '892687333', NULL),
(212, 'Le M?tropole ? Lille', '26, rue des Ponts-de-Comines ', '59000', 'Lille', '320159220', NULL),
(213, 'Majestic ? Lille', '54, rue de B?thune ', '59000', 'Lille', '328524040', NULL),
(214, 'Cin?ma Agn?s-Varda ? Beauvais', '8, avenue de Bourgogne ', '60000', 'Beauvais', '344103089', NULL),
(215, 'Cin?space ? Beauvais', '16, rue Corr?us ', '60000', 'Beauvais', '344114100', NULL),
(216, 'La Fa?encerie ? Creil', 'All?e Nelson ', '60100', 'Creil', '344249570', NULL),
(217, 'Les 4 Normandy ? Alen?on', '20, Grande Rue ', '61000', 'Alen?on', '233263619', NULL),
(218, 'Les 4 Vikings ? Flers', '17, rue Abb?-Lecornu ', '61100', 'Flers', '233644948', NULL),
(219, 'Casino ? Bagnoles de l Orne', '6, avenue Robert-Cousin ', '61140', 'Bagnoles de l Orne', '233378400', NULL),
(220, 'Le Normandy ? Argentan', '13, rue Georges-M?heudin ', '61200', 'Argentan', '433672226', NULL),
(221, 'Cin?ma le Saint-Louis ? Le Theil sur Huisne', '15, rue de la Croix ', '61260', 'Le Theil sur Huisne', '836680597', NULL),
(222, 'Palace ? Arras', '48, Grand Place ', '62000', 'Arras', '321734277', NULL),
(223, 'Cin?-Capitole ? Clermont-Ferrand', '32, place Jaude ', '63000', 'Clermont-Ferrand', '836682288', NULL),
(224, 'Cin?-Jaude ? Clermont-Ferrand', '18, rue Allagnat ', '63000', 'Clermont-Ferrand', '836682288', NULL),
(225, 'Le Paris ? Clermont-Ferrand', '8, place de la R?sistance ', '63000', 'Clermont-Ferrand', '473933176', NULL),
(226, 'Cin?ma le Rio ? Clermont-Ferrand', '178, rue Sous-les-Vignes ', '63100', 'Clermont-Ferrand', '836686887', NULL),
(227, 'Le M?li?s ? Pau', '6, rue Bargoin ', '64000', 'Pau', '892686887', NULL),
(228, 'Le Palais ? Lourdes', 'Palais des congr?s ', '65100', 'Lourdes', '562422797', NULL),
(229, 'Maison de la vall?e ? Luz Saint Sauveur', NULL, '65120', 'Luz Saint Sauveur', '562923838', NULL),
(230, 'Le Casino ? Capvern', NULL, '65130', 'Capvern', '562390046', NULL),
(231, 'Le Maintenon ? Bagn?res-de-Bigorre', 'Rue Alfred Roland ', '65200', 'Bagn?res de Bigorre', '562911200', NULL),
(232, 'Castillet ? Perpignan', '1, boulevard Wilson ', '66000', 'Perpignan', '468512547', NULL),
(233, 'M?ga Castillet ? Perpignan', 'Route dArgel?s ZAC Mas Balande ', '66000', 'Perpignan', '892680129', NULL),
(234, 'Rive Gauche ? Perpignan', '29, quai Vauban ', '66000', 'Perpignan', '468510500', NULL),
(235, 'Cin? Vox ? Strasbourg', '17, rue des Francs-Bourgeois ', '67000', 'Strasbourg', '836682288', NULL),
(236, 'Odyss?e ? Strasbourg', '3, rue des Francs Bourgeois ', '67000', 'Strasbourg', '388751047', NULL),
(237, 'Star ? Strasbourg', '27, rue du Jeu des Enfants ', '67000', 'Strasbourg', '388324497', NULL),
(238, 'Colis?e ? Colmar', '19, rue de Rempart ', '68000', 'Colmar', '389236832', NULL),
(239, 'Kin?polis ? Mulhouse', '167, avenue Robert Schumann ', '68100', 'Mulhouse', '389367800', NULL),
(240, 'La Filature ? Mulhouse', '20, all?e Nathan Katz ', '68100', 'Mulhouse', '389362828', NULL),
(241, 'Le Cin?ma ? Lyon', '18, rue Saint Polycarpe ', '69001', 'Lyon', '836686902', NULL),
(242, 'Le Cin?ma Op?ra ? Lyon', '6, rue Joseph Serlin ', '69001', 'Lyon', '836686902', NULL),
(243, 'Ambiance ? Lyon', '12, rue de la R?publique ', '69002', 'Lyon', '892682015', NULL),
(244, 'Path? ? Lyon', '79, rue de la R?publique ', '69002', 'Lyon', '892682288', NULL),
(245, 'La Fourmi ? Lyon', '68, rue Pierre Corneille ', '69003', 'Lyon', '892680598', NULL),
(246, 'Cin?ma Saint-Denis ? Lyon', '77, grande rue de la Croix Rousse ', '69004', 'Lyon', '478398151', NULL),
(247, 'Bellecombe ? Lyon', '61, rue Inkermann ', '69006', 'Lyon', '478524031', NULL),
(248, 'Institut-Lumi?re ? Lyon', '25, rue du Premier film ', '69008', 'Lyon', '836688879', NULL),
(249, 'Cin? Duch?re ? Lyon', 'Avenue Andre? Sakharov ', '69009', 'Lyon', '472170021', NULL),
(250, 'Le Zola ? Villeurbanne', '117, cours Emile Zola ', '69100', 'Villeurbanne', '892686925', NULL),
(251, 'Le Club ? Vesoul', '15, avenue Jules Ferry ', '70000', 'Vesoul', '384767979', NULL),
(252, 'CineMavia ? Gray', '4, quai Mavia ', '70100', 'Gray', '384653434', NULL),
(253, 'Espace M?li?s ? Lure', '16, esplanade Charles De Gaulle ', '70200', 'Lure', '384302166', NULL),
(254, 'Select Cin?ma ? Plancher les mines', '8, rue des Lauriers ', '70290', 'Plancher les mines', '384236270', NULL),
(255, 'Espace Moli?re ? Luxeuil les Bains', '16, avenue des Ternes ', '70300', 'Luxeuil les Bains', '836680617', NULL),
(256, 'Les Cordeliers ? M?con', 'Place des Cordeliers ', '71000', 'M?con', '385382413', NULL),
(257, 'Marivaux ? M?con', '68, place G?rard Genev?s ', '71000', 'M?con', '385380466', NULL),
(258, 'Axel ? Chalon sur Sa', '67, rue Gloriette ', '71100', 'Chalon-sur-Sa', '836680121', NULL),
(259, 'Cin? Poche', '97 Grande Rue ', '72000', 'Le Mans', '243247385', NULL),
(260, 'Les Cineastes', 'Place Des Comtes Du Maine ', '72000', 'Le Mans', '243512818', NULL),
(261, 'Zoom ? Saint Calais', 'Rue du Th?atre ', '72120', 'Saint Calais', '243354860', NULL),
(262, 'Astr?e ? Chamb?ry', '7, boulevard du Th??tre ', '73000', 'Chamb?ry', '479334053', NULL),
(263, 'Curial ? Chamb?ry', '67, carr? Curial ', '73000', 'Chamb?ry', '479856316', NULL),
(264, 'Le Forum ? Chamb?ry', '28, place du Forum ', '73000', 'Chamb?ry', '479723839', NULL),
(265, 'D?cavision ? Annecy', '7, avenue de Brogny ', '74000', 'Annecy', '450525830', NULL),
(266, 'Les Nemours ? Annecy', '22, rue Sainte Claire ', '74000', 'Annecy', '450454788', NULL),
(267, 'MJC Novel ? Annecy', 'Place Annapurna ', '74000', 'Annecy', '450096835', NULL),
(268, 'Auditorium du Louvre ? Paris', 'Acc?s par la Pyramide ', '75001', 'Paris', '140208400', NULL),
(269, 'Espace du Jeu de Paume ? Paris', 'Place de la Concorde ', '75001', 'Paris', '142606969', NULL),
(270, 'Forum des images ? Paris', '2, Grande Galerie, nouveau forum ', '75001', 'Paris', '144766200', NULL),
(271, 'Mus?e du Louvre: Hall Napol?on ? Paris', NULL, '75001', 'Paris', 'NULL', NULL),
(272, 'Centre Georges-Pompidou Cin?mas I et II ? Paris', 'Place Georges Pompidou ', '75004', 'Paris', '144781233', NULL),
(273, 'Latina ? Paris', '20, rue du Temple ', '75004', 'Paris', '892680751', NULL),
(274, 'Accattone ? Paris', '20, rue Cujas ', '75005', 'Paris', '146338686', NULL),
(275, 'Action Ecoles ? Paris', '23, rue des Ecoles ', '75005', 'Paris', '143297989', NULL),
(276, 'Bretagne ? Paris', '73, boulevard du Montparnasse ', '75006', 'Paris', '892892892', NULL),
(277, 'l Arlequin ? Paris', '76, rue de Rennes ', '75006', 'Paris', '892892892', NULL),
(278, 'Le Saint Germain des Pr?s, Salle G. de Beauregard ? Paris', 'Place Saint Germain des Pr?s ', '75006', 'Paris', '142228723', NULL),
(279, 'Les Trois Luxembourg ? Paris', '67, rue Monsieur le Prince ', '75006', 'Paris', '892689325', NULL),
(280, 'Lucernaire ? Paris', '53, rue Notre Dame des Champs ', '75006', 'Paris', '142222650', NULL),
(281, 'Institut culturel italien ? Paris', '50, rue de Varenne ', '75007', 'Paris', 'NULL', NULL),
(282, 'La Pagode ? Paris', '57, rue de Babylone ', '75007', 'Paris', '892892892', NULL),
(283, 'Les Cinq Caumartin ? Paris', '101, rue Saint Lazare ', '75009', 'Paris', '892892892', NULL),
(284, 'Max Linder Panorama ? Paris', '24, boulevard Poissonni?re ', '75009', 'Paris', '892685052', NULL),
(285, 'Paris Story ? Paris', '11bis rue Scribe ', '75009', 'Paris', '142666206', NULL),
(286, 'Cin?math?que fran?aise salle du Palais de Chaillot ? Paris', '7, avenue Albert de Mun ', '75016', 'Paris', '156260101', NULL),
(287, 'Goethe Institut ? Paris', '17, avenue dI?na ', '75016', 'Paris', '144439230', NULL),
(288, 'Majestic Passy ? Paris', '18, rue de Passy ', '75016', 'Paris', '892892892', NULL),
(289, 'Mus?e de l Homme ? Paris', 'Place du Trocad?ro. Palais de Chaillot ', '75016', 'Paris', '144057272', NULL),
(290, 'Le Melville ? Rouen', '75 rue du G?n?ral Leclerc ', '76000', 'Rouen', '235071848', NULL),
(291, 'Les Clubs ? Le Havre', '99, avenue Foch ', '76600', 'Le Havre', '836680122', NULL),
(292, 'Sirius ? Le Havre', '5, rue Duguesclin ', '76600', 'Le Havre', '235265215', NULL),
(293, 'La Grange ? Vaux le P?nil', 'Rue Ambroise Pro ', '77000', 'Vaux-le-P?nil', '164522930', NULL),
(294, 'Rex ? Melun', '2bis, avenue du 31eme R?giment dInfanterie ', '77000', 'Melun', 'NULL', NULL),
(295, 'Vari?t?s ? Melun', '20, boulevard Chamblain ', '77000', 'Melun', '892687021', NULL),
(296, 'Cyrano ? Versailles', '7, rue Rameau ', '78000', 'Versailles', '892687025', NULL),
(297, 'Roxane ? Versailles', '6, rue Saint Simon ', '78000', 'Versailles', '892680594', NULL),
(298, 'C2L ? Saint Germain en Laye', '25, rue du Vieux March', '78100', 'Saint-Germain-en-Laye', '892688103', NULL),
(299, 'Le Moulin du Roc ? Niort', 'Boulevard Main ', '79000', 'Niort', '549773232', NULL),
(300, 'Le Familia ? Thouars', 'Place du Bo?l ', '79100', 'Thouars', '549660648', NULL),
(301, 'Cin? Saint Leu ? Amiens', '5-9, rue de la Plumette ', '80000', 'Amiens', '322916123', NULL),
(302, 'Maison de la Culture d Amiens ? Amiens', 'Place L?on Gontier ', '80006', 'Amiens', '322977979', NULL),
(303, 'l Athanor salle ARCE ? Albi', 'Place de lAmiti? entre les Peuples ', '81000', 'Albi', '563542717', NULL),
(304, 'Le Lap?rouse ? Albi', '60, rue S?r? de Rivi?res ', '81000', 'Albi', '563382223', NULL),
(305, 'Le Tivoli ? Albi', '2, rue Pierre Gilles ', '81000', 'Albi', '836680125', NULL),
(306, 'CAP Cin?ma Le Paris ? Montauban', '21 Boulevard Garrisson ', '82000', 'Montauban', '892682012', NULL),
(307, 'Multiplexe CAP Cinema', 'ZI Nord - Futuropole ', '82000', 'Montauban', '892682012', NULL),
(308, 'Concorde ? Moissac', '19, boulevard Delbrel ', '82200', 'Moissac', '563040111', NULL),
(309, 'Cin? Libert? ? Toulon', '46, boulevard Mar?chal Leclerc et 44, rue Revel ', '83000', 'Toulon', '494924950', NULL),
(310, 'Le Royal ? Toulon', '2, rue du Docteur Jean Bertholet ', '83000', 'Toulon', '494242000', NULL),
(311, 'Capitole ? Avignon', '3, rue Porquery de Boisserin ', '84000', 'Avignon', '890822427', NULL),
(312, 'Utopia La Manutention ? Avignon', '4, rue des Escaliers Sainte Anne ', '84000', 'Avignon', '490826536', NULL),
(313, 'Utopia R?publique ? Avignon', '5, rue Figui?re ', '84000', 'Avignon', '490826536', NULL),
(314, 'Vox ? Avignon', '22, place de lHorloge ', '84000', 'Avignon', '490820361', NULL),
(315, 'Cin?ville ? La Roche sur Yon', 'Rue Fran?ois Cevert ', '85000', 'La Roche-sur-Yon', '836680666', NULL),
(316, 'l Image ? La Roche sur Yon', '3, rue Boileau ', '85000', 'La Roche-sur-Yon', '251401361', NULL),
(317, 'Cin? A ? Chatellerault', '58, boulevard Blossac ', '86100', 'Chatellerault', '836680041', NULL),
(318, 'Lido ? Limoges', '3, avenue du G?n?ral de Gaulle ', '87000', 'Limoges', '555774079', NULL),
(319, 'Multiplex Grand Ecran ? Limoges', '11, place Denis Dussoubs ', '87000', 'Limoges', '555774079', NULL),
(320, 'Cinema Le Lux ? Bellac', '3, Avenue de la Libert', '87300', 'Bellac', '555681174', NULL),
(321, 'Cin?ma Palace ? Epinal', '17, rue des Etats Unis ', '88000', 'Epinal', '836680073', NULL),
(322, 'Le Casino ? Auxerre', '1, boulevard du 11 Novembre ', '89000', 'Auxerre', '892688108', NULL),
(323, 'Le Rex ? Sens', '1, place Jean Jaur?s ', '89100', 'Sens', '386651347', NULL),
(324, 'Le Vox ? Sens', '14, rue Victor Guichard ', '89100', 'Sens', '386651167', NULL),
(325, 'Cin?ma des quais ? Belfort', '1, boulevard Richelieu ', '90000', 'Belfort', '384904040', NULL),
(326, 'Cin?ma des 5 fontaines ? Delle', '1, rue Jules Joachim ', '90100', 'Delle', '384366850', NULL),
(327, 'Arcel Corbeil ? Corbeil Essonnes', '15, place L?on Cass', '91100', 'Corbeil-Essonnes', '160880644', NULL),
(328, 'Calypso ? Viry Ch?tillon', '38, rue Victor Basch ', '91170', 'Viry-Ch?tillon', '892680578', NULL),
(329, 'Les Lumi?res ? Nanterre', '49, rue Maurice-Thorez ', '92000', 'Nanterre', '892657031', NULL),
(330, 'Cin?ma Landowski ? Boulogne Billancourt', '28, avenue Andr?-Morizet ', '92100', 'Boulogne-Billancourt', '892683930', NULL),
(331, 'Magic Cin?ma ? Bobigny', 'Rue du Chemin-Vert, centre commercial ', '93000', 'Bobigny', '836680020', NULL),
(332, 'Magic Cin?ma ? Bobigny', 'Rue du Chemin-Vert, centre commercial ', '93000', 'Bobigny', '836680020', NULL),
(333, 'Georges M?li?s ? Montreuil', 'Avenue de la R?sistance, centre commercial ', '93100', 'Montreuil', '148706913', NULL),
(334, 'Cin?mas du palais ? Cr?teil', '40, all?e Parmentier ', '94000', 'Cr?teil', '892689123', NULL),
(335, 'La Lucarne ? Cr?teil', '100, rue Juliette-Savar ', '94000', 'Cr?teil', '143775860', NULL),
(336, 'Le Lido ? Saint Maur des Foss', '70, avenue de la R?publique ', '94100', 'Saint-Maur-des-Foss', '148830618', NULL),
(337, 'Cin?ma Daniel-Sorano ? Vincennes', '16, rue Charles-Path', '94300', 'Vincennes', 'NULL', NULL),
(338, 'Le Vincennes ? Vincennes', '30, avenue de Paris ', '94300', 'Vincennes', '892687511', NULL),
(339, 'Salle Aragon-Triolet ? Orly', '1, place du Fer-?-Cheval ', '94310', 'Orly', '148905668', NULL),
(340, 'Le Galil?e ? Argenteuil', '3ter, rue de lAbb? Fleury ', '95100', 'Argenteuil', '892680114', NULL),
(341, 'Cyrano de Bergerac ? Sannois', 'Place du G?n?ral-Leclerc ', '95110', 'Sannois', '139818156', NULL),
(342, 'Pierre Fresnay Cin?ma ? Ermont', '3, rue Saint-Flaive ', '95120', 'Ermont', '134440380', NULL),
(343, 'Cin? Henri Langlois ? Franconville', '32bis rue de la Station ', '95130', 'Franconville', '892681285', NULL),
(344, 'Jacques Brel ? Garges l?s Gonesse', '1, place de lH?tel-de-Ville ', '95140', 'Garges-l?s-Gonesse', '139865410', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `distribution`
--

CREATE TABLE `distribution` (
  `NumFilm` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `NumActeur` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `role` varchar(15) NOT NULL DEFAULT '',
  `Salaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `distribution`
--

INSERT INTO `distribution` (`NumFilm`, `NumActeur`, `role`, `Salaire`) VALUES
(2, 1, 'Policier', 1300000),
(2, 2, 'Tueur', 1250000),
(2, 3, 'M?decin', 1200000),
(2, 4, 'Agent FBI', 1150000),
(2, 5, 'V?t?rinaire', 1300000),
(7, 1, 'M?decin', 1300000),
(7, 2, 'Agent FBI', 1250000),
(7, 3, 'V?t?rinaire', 1200000),
(12, 1, 'Chauffeur', 1250000),
(12, 3, 'Body Guard', 1200000),
(12, 4, 'Policier', 1150000),
(12, 5, 'Tueur', 1300000),
(12, 7, 'M?decin', 1250000),
(13, 1, 'Chauffeur', 1150000),
(13, 2, 'Body Guard', 1300000),
(13, 4, 'Tueur', 1200000),
(13, 5, 'M?decin', 1150000),
(13, 6, 'Policier', 1250000),
(21, 2, 'Body Guard', 1150000),
(21, 4, 'V?t?rinaire', 1250000),
(21, 5, 'Agent FBI', 1300000),
(21, 7, 'Chauffeur', 1200000),
(23, 1, 'Agent FBI', 1200000),
(23, 3, 'V?t?rinaire', 1150000),
(23, 4, 'Chauffeur', 1300000),
(23, 5, 'Body Guard', 1250000),
(30, 4, 'Policier', 1200000),
(30, 5, 'Tueur', 1150000);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `Numfilm` int(10) UNSIGNED NOT NULL,
  `Titre` varchar(100) DEFAULT NULL,
  `Genre` tinyint(3) UNSIGNED DEFAULT NULL,
  `Annee` year(4) DEFAULT NULL,
  `Longueur` time DEFAULT NULL,
  `budget` int(10) UNSIGNED DEFAULT NULL,
  `Nb_spec_cumule` int(11) DEFAULT NULL,
  `Realisateur` mediumint(8) UNSIGNED DEFAULT NULL,
  `Salaire_real` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`Numfilm`, `Titre`, `Genre`, `Annee`, `Longueur`, `budget`, `Nb_spec_cumule`, `Realisateur`, `Salaire_real`) VALUES
(1, 'Shutter Island  ', 1, 2010, '01:35:00', 1000000, 1250000, 1, 950000),
(2, 'A Letter to Elia  ', 2, 2010, '01:45:00', 25000000, 25000, 2, 975000),
(3, 'Shine a Light  ', 3, 2008, '01:50:00', 12000000, 2560000, 3, 1000000),
(4, 'La Cl? de la r?serve  ', 4, 2007, '02:05:00', 6000000, 1625000, 4, 1025000),
(5, 'Les Infiltr?s  ', 5, 2006, '01:55:00', 125000, 950000, 5, 1050000),
(6, 'No Direction Home - Bob Dylan  ', 6, 2005, '01:35:00', 35000, 135000, 6, 1075000),
(7, 'Lightning in a bottle  ', 7, 2004, '01:45:00', 658000, 950000, 7, 1100000),
(8, 'Aviator  ', 8, 2004, '01:50:00', 950000, 759000, 8, 1125000),
(9, 'Gang de requins  ', 9, 2004, '02:05:00', 1250000, 658000, 9, 1150000),
(10, 'Une d?cennie sous influence  ', 10, 2003, '01:55:00', 1000000, 652000, 1, 1175000),
(11, 'Du Mali au Mississippi  ', 11, 2003, '01:35:00', 25000000, 1250000, 1, 1200000),
(12, 'Gangs of New York  ', 12, 2002, '01:45:00', 12000000, 25000, 1, 1225000),
(13, 'Mon voyage en Italie  ', 13, 1999, '01:50:00', 6000000, 2560000, 2, 1250000),
(14, 'A tombeau ouvert  ', 14, 1999, '02:05:00', 125000, 1625000, 2, 1275000),
(15, 'Kundun  ', 15, 1997, '01:55:00', 35000, 950000, 2, 1300000),
(16, 'Un Voyage de Martin Scorsese...  ', 16, 1995, '01:35:00', 658000, 135000, 3, 1325000),
(17, 'Casino  ', 17, 1995, '01:45:00', 950000, 950000, 3, 1350000),
(18, 'Quizz Show  ', 18, 1995, '01:50:00', 1250000, 759000, 3, 1375000),
(19, 'Le Temps de l innocence  ', 19, 1993, '02:05:00', 1000000, 658000, 4, 1400000),
(20, 'Gershwin  ', 20, 1992, '01:55:00', 25000000, 652000, 4, 1425000),
(21, 'Les Nerfs ? vif  ', 21, 1991, '01:35:00', 12000000, 1250000, 4, 1450000),
(22, 'La Liste noire  ', 22, 1990, '01:45:00', 6000000, 25000, 5, 1475000),
(23, 'Les Affranchis  ', 23, 1990, '01:50:00', 125000, 2560000, 5, 1500000),
(24, 'New York stories  ', 24, 1989, '02:05:00', 35000, 1625000, 5, 1525000),
(25, 'La Derni?re tentation du Christ  ', 25, 1988, '01:55:00', 658000, 950000, 6, 1550000),
(26, 'Bad  ', 26, 1987, '01:35:00', 950000, 135000, 6, 1575000),
(27, 'Autour de minuit  ', 27, 1986, '01:45:00', 1250000, 950000, 7, 1600000),
(28, 'La Couleur de l argent  ', 28, 1986, '01:50:00', 1000000, 759000, 7, 1625000),
(29, 'After Hours  ', 29, 1985, '02:05:00', 25000000, 658000, 8, 950000),
(30, 'La Valse des pantins  ', 30, 1983, '01:55:00', 12000000, 652000, 8, 975000),
(31, 'Raging Bull  ', 31, 1980, '01:35:00', 6000000, 1250000, 9, 1000000),
(32, 'The Last waltz  ', 32, 1978, '01:45:00', 125000, 25000, 10, 1025000),
(33, 'New York, New York  ', 33, 1977, '01:50:00', 35000, 2560000, 1, 1050000),
(34, 'Taxi Driver  ', 34, 1976, '02:05:00', 658000, 1625000, 2, 1075000),
(35, 'Cannonball  ', 35, 1976, '01:55:00', 950000, 950000, 3, 1100000),
(36, 'Italianamerican  ', 36, 1974, '01:35:00', 1250000, 135000, 4, 1125000),
(37, 'Alice n est plus ici  ', 37, 1974, '01:45:00', 1000000, 950000, 5, 1150000),
(38, 'Mean Streets  ', 38, 1973, '01:50:00', 25000000, 759000, 6, 1175000),
(39, 'Bertha Boxcar  ', 39, 1973, '02:05:00', 12000000, 658000, 7, 1200000),
(40, 'Le Grand rasage  ', 40, 1967, '01:55:00', 6000000, 652000, 8, 1225000),
(41, 'Who s that Knocking at My Door ?  ', 41, 1967, '01:35:00', 125000, 1250000, 9, 1250000),
(42, 'It s not just you, Murray !  ', 42, 1964, '01:45:00', 35000, 25000, 1, 1275000),
(43, 'What s a Nice Girl Like You D... ', 1, 1963, '01:50:00', 658000, 2560000, 1, 1300000),
(44, 'Inglourious Basterds  ', 2, 2008, '02:05:00', 950000, 1625000, 1, 1325000),
(45, 'Sukiyaki Western Django  ', 3, 2008, '01:55:00', 1250000, 950000, 2, 1350000),
(46, 'Plan?te terreur - un film Gri...  ', 4, 2007, '01:35:00', 1000000, 135000, 2, 1375000),
(47, 'Boulevard de la mort - un fil...  ', 5, 2007, '01:45:00', 25000000, 950000, 2, 1400000),
(48, 'Michael Moore - Pol?mique Sys...  ', 6, 2007, '01:50:00', 12000000, 759000, 3, 1425000),
(49, 'Double Feature - Grindhouse  ', 7, 2007, '02:05:00', 6000000, 658000, 3, 1450000),
(50, 'Diary of the Dead - Chronique...  ', 8, 2007, '01:55:00', 125000, 652000, 3, 1475000),
(51, 'Sin City  ', 9, 2005, '01:35:00', 35000, 1250000, 4, 1500000),
(52, 'Kill Bill - Volume 1  ', 10, 2003, '01:45:00', 658000, 25000, 4, 1525000),
(53, 'Kill Bill - Volume 2  ', 11, 2003, '01:50:00', 950000, 2560000, 4, 1550000),
(54, 'Jackie Chan -  my story  ', 12, 1998, '02:05:00', 1250000, 1625000, 5, 1575000),
(55, 'Jackie Brown  ', 13, 1997, '01:55:00', 1000000, 950000, 5, 1600000),
(56, 'Girl 6  ', 14, 1996, '01:35:00', 25000000, 135000, 5, 1625000),
(57, 'Une nuit en enfer  ', 15, 1996, '01:45:00', 12000000, 950000, 6, 950000),
(58, 'Groom Service  ', 16, 1995, '01:50:00', 6000000, 759000, 6, 975000),
(59, 'Desperado  ', 17, 1995, '02:05:00', 125000, 658000, 7, 1000000),
(60, 'Rock  ', 18, 1995, '01:55:00', 35000, 652000, 7, 1025000),
(61, 'Pulp Fiction  ', 19, 1994, '01:35:00', 658000, 1250000, 8, 1050000),
(62, 'Sleep with me  ', 20, 1994, '01:45:00', 950000, 25000, 8, 1075000),
(63, 'Tueurs n?s  ', 21, 1994, '01:50:00', 1250000, 2560000, 9, 1100000),
(64, 'True Romance  ', 22, 1993, '02:05:00', 1000000, 1625000, 10, 1125000),
(65, 'Reservoir Dogs  ', 23, 1992, '01:55:00', 25000000, 950000, 1, 1150000),
(66, 'Eddie Presley  ', 24, 1992, '01:35:00', 12000000, 135000, 2, 1175000),
(67, 'My Best Friend s Birthday ', 25, 1987, '01:45:00', 6000000, 950000, 3, 1200000),
(68, 'Au-del?  ', 26, 2010, '01:50:00', 125000, 759000, 4, 1225000),
(69, 'Invictus  ', 27, 2009, '02:05:00', 35000, 658000, 5, 1250000),
(70, 'Gran Torino  ', 28, 2008, '01:55:00', 658000, 652000, 6, 1275000),
(71, 'l Echange  ', 29, 2008, '01:35:00', 950000, 1250000, 7, 1300000),
(72, 'Pierre Rissient - homme de ci...  ', 30, 2007, '01:45:00', 1250000, 25000, 8, 1325000),
(73, 'Lettres d Iwo-Jima  ', 31, 2007, '01:50:00', 1000000, 2560000, 9, 1350000),
(74, 'M?moires de nos p?res  ', 32, 2006, '02:05:00', 25000000, 1625000, 1, 1375000),
(75, 'Million Dollar Baby  ', 33, 2004, '01:55:00', 12000000, 950000, 1, 1400000),
(76, 'Une d?cennie sous influence  ', 34, 2003, '01:35:00', 6000000, 135000, 1, 1425000),
(77, 'Cr?ance de sang  ', 35, 2002, '01:45:00', 125000, 950000, 2, 1450000),
(78, 'Mystic River  ', 36, 2002, '01:50:00', 35000, 759000, 2, 1475000),
(79, 'Piano Blues  ', 37, 2001, '02:05:00', 658000, 658000, 2, 1500000),
(80, 'Space Cowboys  ', 38, 2000, '01:55:00', 950000, 652000, 3, 1525000),
(81, 'Jug? coupable  ', 39, 1998, '01:35:00', 1250000, 1250000, 3, 1550000),
(82, 'Minuit dans le jardin du bien...  ', 40, 1997, '01:45:00', 1000000, 25000, 3, 1575000),
(83, 'Les Pleins pouvoirs  ', 41, 1996, '01:50:00', 25000000, 2560000, 4, 1600000),
(84, 'Sur la route de Madison  ', 42, 1995, '02:05:00', 12000000, 1625000, 4, 1625000),
(85, 'Casper  ', 1, 1995, '01:55:00', 6000000, 950000, 4, 950000),
(86, 'Un Voyage de Martin Scorsese...  ', 2, 1995, '01:35:00', 125000, 135000, 5, 975000),
(87, 'Les Cent et une nuits  ', 3, 1994, '01:45:00', 35000, 950000, 5, 1000000),
(88, 'A Century of Cinema  ', 4, 1994, '01:50:00', 658000, 759000, 5, 1025000),
(89, 'Un monde parfait  ', 5, 1993, '02:05:00', 950000, 658000, 6, 1050000),
(90, 'Dans la ligne de mire  ', 6, 1993, '01:55:00', 1250000, 652000, 6, 1075000),
(91, 'Impitoyable  ', 7, 1992, '01:35:00', 1000000, 1250000, 7, 1100000),
(92, 'La Rel?ve  ', 8, 1990, '01:45:00', 25000000, 25000, 7, 1125000),
(93, 'Chasseur blanc, coeur noir  ', 9, 1989, '01:50:00', 12000000, 2560000, 8, 1150000),
(94, 'Pink Cadillac  ', 10, 1989, '02:05:00', 6000000, 1625000, 8, 1175000),
(95, 'La Derni?re cible  ', 11, 1988, '01:55:00', 125000, 950000, 9, 1200000),
(96, 'Bird  ', 12, 1987, '01:35:00', 35000, 135000, 10, 1225000),
(97, 'Le Ma?tre de guerre  ', 13, 1986, '01:45:00', 658000, 950000, 1, 1250000),
(98, 'Pale Rider, le cavalier solit...  ', 14, 1985, '01:50:00', 950000, 759000, 2, 1275000),
(99, 'Haut les flingues !  ', 15, 1984, '02:05:00', 1250000, 658000, 3, 1300000),
(100, 'Le Retour de l inspecteur Harry  ', 16, 1983, '01:55:00', 1000000, 652000, 4, 1325000),
(101, 'Firefox, l arme absolue  ', 17, 1982, '01:35:00', 25000000, 1250000, 5, 1350000),
(102, 'Honkytonk Man  ', 18, 1982, '01:45:00', 12000000, 25000, 6, 1375000),
(103, 'Ca va cogner  ', 19, 1980, '01:50:00', 6000000, 2560000, 7, 1400000),
(104, 'Bronco Billy  ', 20, 1980, '02:05:00', 125000, 1625000, 8, 1425000),
(105, 'l Evad? d Alcatraz  ', 21, 1979, '01:55:00', 35000, 950000, 9, 1450000),
(106, 'Doux, Dur et Dingue  ', 22, 1978, '01:35:00', 658000, 135000, 1, 1475000),
(107, 'l Epreuve de force  ', 23, 1977, '01:45:00', 950000, 950000, 1, 1500000),
(108, 'Josey Wales, hors-la-loi  ', 24, 1976, '01:50:00', 1250000, 759000, 1, 1525000),
(109, 'l Inspecteur ne renonce jamais  ', 25, 1976, '02:05:00', 1000000, 658000, 2, 1550000),
(110, 'La Sanction  ', 26, 1975, '01:55:00', 25000000, 652000, 2, 1575000),
(111, 'Le Canardeur  ', 27, 1974, '01:35:00', 12000000, 1250000, 2, 1600000),
(112, 'Magnum Force  ', 28, 1973, '01:45:00', 6000000, 25000, 3, 1625000),
(113, 'Breezy  ', 29, 1973, '01:50:00', 125000, 2560000, 3, 950000),
(114, 'l Homme des hautes plaines  ', 30, 1973, '02:05:00', 35000, 1625000, 3, 975000),
(115, 'Joe Kidd  ', 31, 1972, '01:55:00', 658000, 950000, 4, 1000000),
(116, 'Un frisson dans la nuit  ', 32, 1971, '01:35:00', 950000, 135000, 4, 1025000),
(117, 'l Inspecteur Harry  ', 33, 1971, '01:45:00', 1250000, 950000, 4, 1050000),
(118, 'Les Proies  ', 34, 1971, '01:50:00', 1000000, 759000, 5, 1075000),
(119, 'Sierra Torride  ', 35, 1970, '02:05:00', 25000000, 658000, 5, 1100000),
(120, 'De l or pour les braves  ', 36, 1970, '01:55:00', 12000000, 652000, 5, 1125000),
(121, 'La Kermesse de l Ouest  ', 37, 1969, '01:35:00', 6000000, 1250000, 6, 1150000),
(122, 'Quand les aigles attaquent  ', 38, 1969, '01:45:00', 125000, 25000, 6, 1175000),
(123, 'Pendez-les haut et court  ', 39, 1968, '01:50:00', 35000, 2560000, 7, 1200000),
(124, 'Un Sh?rif ? New York  ', 40, 1968, '02:05:00', 658000, 1625000, 7, 1225000),
(125, 'Le Bon, la brute et le truand  ', 41, 1966, '01:55:00', 950000, 950000, 8, 1250000),
(126, 'Les Sorci?res  ', 42, 1966, '01:35:00', 1250000, 135000, 8, 1275000),
(127, 'Et pour quelques dollars de plus  ', 1, 1965, '01:45:00', 1000000, 950000, 9, 1300000),
(128, 'Pour une poign?e de dollars  ', 2, 1964, '01:50:00', 25000000, 759000, 10, 1325000),
(129, 'Le Jour le plus long   ', 3, 1962, '02:05:00', 12000000, 658000, 1, 1350000),
(130, 'C est la guerre  ', 4, 1958, '01:55:00', 6000000, 652000, 2, 1375000),
(131, 'Escapade au Japon  ', 5, 1957, '01:35:00', 125000, 1250000, 3, 1400000),
(132, 'The First travelling sales lady  ', 6, 1956, '01:45:00', 35000, 25000, 4, 1425000),
(133, 'Ne dites jamais adieu  ', 7, 1956, '01:50:00', 658000, 2560000, 5, 1450000),
(134, 'Lady Godiva of Coventry  ', 8, 1955, '02:05:00', 950000, 1625000, 6, 1475000),
(135, 'La Revanche de la creature  ', 9, 1955, '01:55:00', 1250000, 950000, 7, 1500000),
(136, 'Francis in the Navy  ', 10, 1955, '01:35:00', 1000000, 135000, 8, 1525000),
(137, 'Tarantula ', 11, 1955, '01:45:00', 25000000, 950000, 9, 1550000),
(138, 'Indiana Jones 5  ', 12, 2012, '01:50:00', 12000000, 759000, 1, 1575000),
(139, 'Les Aventures de Tintin -  Le...  ', 13, 2011, '02:05:00', 6000000, 658000, 1, 1600000),
(140, 'War Horse  ', 14, 2011, '01:55:00', 125000, 652000, 1, 1625000),
(141, 'Paul  ', 15, 2010, '01:35:00', 35000, 1250000, 2, 950000),
(142, 'Matt Helm  ', 16, 2009, '01:45:00', 658000, 25000, 2, 975000),
(143, 'Indiana Jones et le Royaume d...  ', 17, 2008, '01:50:00', 950000, 2560000, 2, 1000000),
(144, 'Munich  ', 18, 2005, '02:05:00', 1250000, 1625000, 3, 1025000),
(145, 'La Guerre des Mondes  ', 19, 2004, '01:55:00', 1000000, 950000, 3, 1050000),
(146, 'Le Terminal  ', 20, 2004, '01:35:00', 25000000, 135000, 3, 1075000),
(147, 'Minority Report  ', 21, 2002, '01:45:00', 12000000, 950000, 4, 1100000),
(148, 'Arr?te-moi si tu peux  ', 22, 2002, '01:50:00', 6000000, 759000, 4, 1125000),
(149, 'Austin Powers dans Goldmember  ', 23, 2002, '02:05:00', 125000, 658000, 4, 1150000),
(150, 'A.I. Intelligence artificielle  ', 24, 2001, '01:55:00', 35000, 652000, 5, 1175000),
(151, 'Vanilla Sky  ', 25, 2001, '01:35:00', 658000, 1250000, 5, 1200000),
(152, 'Il faut sauver le soldat Ryan  ', 26, 1998, '01:45:00', 950000, 25000, 5, 1225000),
(153, 'Amistad  ', 27, 1997, '01:50:00', 1250000, 2560000, 6, 1250000),
(154, 'Le Monde Perdu - Jurassic Park  ', 28, 1997, '02:05:00', 1000000, 1625000, 6, 1275000),
(155, 'A Century of Cinema  ', 29, 1994, '01:55:00', 25000000, 950000, 7, 1300000),
(156, 'Jurassic Park  ', 30, 1993, '01:35:00', 12000000, 135000, 7, 1325000),
(157, 'La Liste de Schindler  ', 31, 1993, '01:45:00', 6000000, 950000, 8, 1350000),
(158, 'Hook ou la revanche du Capita...  ', 32, 1991, '01:50:00', 125000, 759000, 8, 1375000),
(159, 'Pour toujours  ', 33, 1990, '02:05:00', 35000, 658000, 9, 1400000),
(160, 'Always  ', 34, 1989, '01:55:00', 658000, 652000, 10, 1425000),
(161, 'Indiana Jones et la Derni?re...  ', 35, 1989, '01:35:00', 950000, 1250000, 1, 1450000),
(162, 'L Empire du soleil  ', 36, 1987, '01:45:00', 1250000, 25000, 2, 1475000),
(163, 'Histoires fantastiques  ', 37, 1986, '01:50:00', 1000000, 2560000, 3, 1500000),
(164, 'La Couleur pourpre  ', 38, 1985, '02:05:00', 25000000, 1625000, 4, 1525000),
(165, 'Explorers  ', 39, 1985, '01:55:00', 12000000, 950000, 5, 1550000),
(166, 'Indiana Jones et le Temple ma...  ', 40, 1984, '01:35:00', 6000000, 135000, 6, 1575000),
(167, 'Gremlins  ', 41, 1984, '01:45:00', 125000, 950000, 7, 1600000),
(168, 'La Quatri?me Dimension  ', 42, 1983, '01:50:00', 35000, 759000, 8, 1625000),
(169, 'Poltergeist  ', 1, 1982, '02:05:00', 658000, 658000, 9, 950000),
(170, 'E.T. l extra-terrestre  ', 2, 1982, '01:55:00', 950000, 652000, 1, 975000),
(171, 'Chambre 666  ', 3, 1982, '01:35:00', 1250000, 1250000, 1, 1000000),
(172, 'Indiana Jones et les aventuri...  ', 4, 1981, '01:45:00', 1000000, 25000, 1, 1025000),
(173, 'The Blues Brothers  ', 5, 1979, '01:50:00', 25000000, 2560000, 2, 1050000),
(174, '1941', 6, 1979, '02:05:00', 12000000, 1625000, 2, 1075000),
(175, 'Rencontres du 3?me type  ', 7, 1977, '01:55:00', 6000000, 950000, 2, 1100000),
(176, 'Les Dents de la Mer  ', 8, 1975, '01:35:00', 125000, 135000, 3, 1125000),
(177, 'Sugarland express  ', 9, 1974, '01:45:00', 35000, 950000, 3, 1150000),
(178, 'Duel  ', 10, 1971, '01:50:00', 658000, 759000, 3, 1175000),
(179, 'Amblin   ', 11, 1968, '02:05:00', 950000, 658000, 4, 1200000),
(180, 'Firelight  ', 12, 1964, '01:55:00', 1250000, 652000, 4, 1225000),
(181, 'Fighter Squad  ', 13, 1961, '01:35:00', 1000000, 1250000, 4, 1250000),
(182, 'Escape to Nowhere  ', 14, 1961, '01:45:00', 25000000, 25000, 5, 1275000),
(183, 'The Last Gun ', 15, 1959, '01:50:00', 12000000, 2560000, 5, 1300000),
(184, 'Absurda  ', 16, 2007, '02:05:00', 6000000, 1625000, 5, 1325000),
(185, 'INLAND EMPIRE  ', 17, 2006, '01:55:00', 125000, 950000, 6, 1350000),
(186, 'Midnight Movies  ', 18, 2004, '01:35:00', 35000, 135000, 6, 1375000),
(187, 'Rabbits  ', 19, 2002, '01:45:00', 658000, 950000, 7, 1400000),
(188, 'Mulholland Drive  ', 20, 2001, '01:50:00', 950000, 759000, 7, 1425000),
(189, 'Une histoire vraie  ', 21, 1998, '02:05:00', 1250000, 658000, 8, 1450000),
(190, 'Lost Highway  ', 22, 1997, '01:55:00', 1000000, 652000, 8, 1475000),
(191, 'Lumi?re et compagnie  ', 23, 1995, '01:35:00', 25000000, 1250000, 9, 1500000),
(192, 'Nadja  ', 24, 1994, '01:45:00', 12000000, 25000, 10, 1525000),
(193, 'Twin Peaks  ', 25, 1991, '01:50:00', 6000000, 2560000, 1, 1550000),
(194, 'Sailor et Lula  ', 26, 1990, '02:05:00', 125000, 1625000, 2, 1575000),
(195, 'Blue Velvet  ', 27, 1986, '01:55:00', 35000, 950000, 3, 1600000),
(196, 'Dune  ', 28, 1984, '01:35:00', 658000, 135000, 4, 1625000),
(197, 'Elephant Man  ', 29, 1980, '01:45:00', 950000, 950000, 5, 950000),
(198, 'Eraserhead  ', 30, 1976, '01:50:00', 1250000, 759000, 6, 975000),
(199, 'The Amputee  ', 31, 1974, '02:05:00', 1000000, 658000, 7, 1000000),
(200, 'The Grandmother  ', 32, 1970, '01:55:00', 25000000, 652000, 8, 1025000),
(201, 'L Alphabet  ', 33, 1968, '01:35:00', 12000000, 1250000, 9, 1050000),
(202, 'Six Figures Getting Sick ', 34, 1966, '01:45:00', 6000000, 25000, 1, 1075000),
(203, 'Somewhere  ', 35, 2010, '01:50:00', 125000, 2560000, 1, 1100000),
(204, 'Marie-Antoinette  ', 36, 2005, '02:05:00', 35000, 1625000, 1, 1125000),
(205, 'Lost in Translation  ', 37, 2002, '01:55:00', 658000, 950000, 2, 1150000),
(206, 'CQ  ', 38, 2001, '01:35:00', 950000, 135000, 2, 1175000),
(207, 'Virgin suicides  ', 39, 1999, '01:45:00', 1250000, 950000, 2, 1200000),
(208, 'Torrance Rises  ', 40, 1999, '01:50:00', 1000000, 759000, 3, 1225000),
(209, 'Lick the star  ', 41, 1998, '02:05:00', 25000000, 658000, 3, 1250000),
(210, 'Le Parrain, 3e partie  ', 42, 1990, '01:55:00', 12000000, 652000, 3, 1275000),
(211, 'Anna  ', 1, 1987, '01:35:00', 6000000, 1250000, 4, 1300000),
(212, 'Peggy Sue s est mari?e  ', 2, 1986, '01:45:00', 125000, 25000, 4, 1325000),
(213, 'Cotton Club  ', 3, 1984, '01:50:00', 35000, 2560000, 4, 1350000),
(214, 'Frankenweenie  ', 4, 1984, '02:05:00', 658000, 1625000, 5, 1375000),
(215, 'Rusty James  ', 5, 1983, '01:55:00', 950000, 950000, 5, 1400000),
(216, 'Outsiders  ', 6, 1983, '01:35:00', 1250000, 135000, 5, 1425000),
(217, 'Le Parrain, 2e partie  ', 7, 1975, '01:45:00', 1000000, 950000, 6, 1450000),
(218, 'Le Parrain ', 8, 1972, '01:50:00', 25000000, 759000, 6, 1475000),
(219, 'Redacted  ', 9, 2007, '02:05:00', 12000000, 658000, 7, 1500000),
(220, 'Le Dahlia noir  ', 10, 2005, '01:55:00', 6000000, 652000, 7, 1525000),
(221, 'Femme Fatale  ', 11, 2001, '01:35:00', 125000, 1250000, 8, 1550000),
(222, 'Mission to Mars  ', 12, 1999, '01:45:00', 35000, 25000, 8, 1575000),
(223, 'Snake Eyes  ', 13, 1998, '01:50:00', 658000, 2560000, 9, 1600000),
(224, 'Mission  Impossible  ', 14, 1996, '02:05:00', 950000, 1625000, 10, 1625000),
(225, 'Un Voyage de Martin Scorsese...  ', 15, 1995, '01:55:00', 1250000, 950000, 1, 950000),
(226, 'L Impasse  ', 16, 1993, '01:35:00', 1000000, 135000, 2, 975000),
(227, 'L Esprit de Ca?n  ', 17, 1992, '01:45:00', 25000000, 950000, 3, 1000000),
(228, 'Le B?cher des vanit?s  ', 18, 1990, '01:50:00', 12000000, 759000, 4, 1025000),
(229, 'Outrages  ', 19, 1989, '02:05:00', 6000000, 658000, 5, 1050000),
(230, 'Les Incorruptibles  ', 20, 1987, '01:55:00', 125000, 652000, 6, 1075000),
(231, 'Mafia salad  ', 21, 1986, '01:35:00', 35000, 1250000, 7, 1100000),
(232, 'Body Double  ', 22, 1984, '01:45:00', 658000, 25000, 8, 1125000),
(233, 'Scarface  ', 23, 1983, '01:50:00', 950000, 2560000, 9, 1150000),
(234, 'Blow Out  ', 24, 1981, '02:05:00', 1250000, 1625000, 1, 1175000),
(235, 'Pulsions  ', 25, 1980, '01:55:00', 1000000, 950000, 1, 1200000),
(236, 'Home movies  ', 26, 1979, '01:35:00', 25000000, 135000, 1, 1225000),
(237, 'Furie  ', 27, 1978, '01:45:00', 12000000, 950000, 2, 1250000),
(238, 'Obsession  ', 28, 1976, '01:50:00', 6000000, 759000, 2, 1275000),
(239, 'Carrie au bal du diable  ', 29, 1976, '02:05:00', 125000, 658000, 2, 1300000),
(240, 'Phantom of the paradise  ', 30, 1974, '01:55:00', 35000, 652000, 3, 1325000),
(241, 'Soeurs de sang  ', 31, 1973, '01:35:00', 658000, 1250000, 3, 1350000),
(242, 'Dionysus in  69  ', 32, 1970, '01:45:00', 950000, 25000, 3, 1375000),
(243, 'Attention au lapin  ', 33, 1970, '01:50:00', 1250000, 2560000, 4, 1400000),
(244, 'Hi, Mom !  ', 34, 1969, '02:05:00', 1000000, 1625000, 4, 1425000),
(245, 'Greetings  ', 35, 1968, '01:55:00', 25000000, 950000, 4, 1450000),
(246, 'Murder ? la mod  ', 36, 1967, '01:35:00', 12000000, 135000, 5, 1475000),
(247, 'The Responsive Eye  ', 37, 1966, '01:45:00', 6000000, 950000, 5, 1500000),
(248, 'Show Me a Strong Town and I l...  ', 38, 1966, '01:50:00', 125000, 759000, 5, 1525000),
(249, 'The Wedding party  ', 39, 1966, '02:05:00', 35000, 658000, 6, 1550000),
(250, 'Bridge That Gap  ', 40, 1965, '01:55:00', 658000, 652000, 6, 1575000),
(251, 'Jennifer  ', 41, 1964, '01:35:00', 950000, 1250000, 7, 1600000),
(252, 'Woton s Wake  ', 42, 1962, '01:45:00', 1250000, 25000, 7, 1625000),
(253, '660124 - The Story of an IBM Card  ', 1, 1961, '01:50:00', 1000000, 2560000, 8, 950000),
(254, 'Icarus ', 2, 1960, '02:05:00', 25000000, 1625000, 8, 975000),
(255, 'Le Dernier ma?tre de l air (R,S) ', 3, 2010, '01:55:00', 12000000, 950000, 9, 1000000),
(256, 'Ph?nom?nes (R) ', 4, 2008, '01:35:00', 6000000, 135000, 10, 1025000),
(257, 'La Jeune fille de l eau (R,A) ', 5, 2006, '01:45:00', 125000, 950000, 1, 1050000),
(258, 'Le Village (R) ', 6, 2004, '01:50:00', 35000, 759000, 2, 1075000),
(259, 'Signes (R,A) ', 7, 2002, '02:05:00', 658000, 658000, 3, 1100000),
(260, 'Sixi?me Sens (R) ', 8, 2000, '01:55:00', 950000, 652000, 4, 1125000),
(261, 'Incassable (R) ', 9, 2000, '01:35:00', 1250000, 1250000, 5, 1150000),
(262, 'Wide Awake (R) ', 10, 1998, '01:45:00', 1000000, 25000, 6, 1175000),
(263, 'Praying with Anger (R,A)', 11, 1992, '01:50:00', 25000000, 2560000, 7, 1200000),
(264, 'Monsterpocalypse (R) ', 12, 2012, '02:05:00', 12000000, 1625000, 8, 1225000),
(265, 'Maleficent (R) ', 13, 2010, '01:55:00', 6000000, 950000, 9, 1250000),
(266, 'Waking Sleeping Beauty (A) ', 14, 2009, '01:35:00', 125000, 135000, 1, 1275000),
(267, 'Alice au Pays des Merveilles (R) ', 15, 2009, '01:45:00', 35000, 950000, 1, 1300000),
(268, 'Sweeney Todd, le diabolique b... (R) ', 16, 2007, '01:50:00', 658000, 759000, 1, 1325000),
(269, 'L Etrange No?l de M. Jack 3D (S) ', 17, 2006, '02:05:00', 950000, 658000, 2, 1350000),
(270, 'Les Noces fun?bres (R) ', 18, 2005, '01:55:00', 1250000, 652000, 2, 1375000),
(271, 'Charlie et la chocolaterie (R) ', 19, 2004, '01:35:00', 1000000, 1250000, 2, 1400000),
(272, 'Big Fish (R) ', 20, 2003, '01:45:00', 25000000, 25000, 3, 1425000),
(273, 'La Plan?te des singes (R) ', 21, 2001, '01:50:00', 12000000, 2560000, 3, 1450000),
(274, 'Sleepy Hollow, la l?gende du... (R) ', 22, 1999, '02:05:00', 6000000, 1625000, 3, 1475000),
(275, 'Mars Attacks! (R) ', 23, 1996, '01:55:00', 125000, 950000, 4, 1500000),
(276, 'Ed Wood (R) ', 24, 1994, '01:35:00', 35000, 135000, 4, 1525000),
(277, 'L Etrange No?l de M. Jack (S) ', 25, 1994, '01:45:00', 658000, 950000, 4, 1550000),
(278, 'A Century of Cinema (A) ', 26, 1994, '01:50:00', 950000, 759000, 5, 1575000),
(279, 'Singles (A) ', 27, 1992, '02:05:00', 1250000, 658000, 5, 1600000),
(280, 'Batman, le d?fi (R) ', 28, 1991, '01:55:00', 1000000, 652000, 5, 1625000),
(281, 'Edward aux mains d argent (R,S) ', 29, 1990, '01:35:00', 25000000, 1250000, 6, 950000),
(282, 'Batman (R) ', 30, 1989, '01:45:00', 12000000, 25000, 6, 975000),
(283, 'Beetlejuice (R,S) ', 31, 1988, '01:50:00', 6000000, 2560000, 7, 1000000),
(284, 'Pee Wee Big Adventure (R) ', 32, 1985, '02:05:00', 125000, 1625000, 7, 1025000),
(285, 'The Jar (R) ', 33, 1985, '01:55:00', 35000, 950000, 8, 1050000),
(286, 'Frankenweenie (R,S) ', 34, 1984, '01:35:00', 658000, 135000, 8, 1075000),
(287, 'Vincent (R,S) ', 35, 1982, '01:45:00', 950000, 950000, 9, 1100000),
(288, 'Aladdin and his Wonderful Lamp (R) ', 36, 1982, '01:50:00', 1250000, 759000, 10, 1125000),
(289, 'Hansel et Gretel (R) ', 37, 1982, '02:05:00', 1000000, 658000, 1, 1150000),
(290, 'Luau (R,S) ', 38, 1982, '01:55:00', 25000000, 652000, 2, 1175000),
(291, 'Stalk of the Celery (R,S,A) ', 39, 1979, '01:35:00', 12000000, 1250000, 3, 1200000),
(292, 'Doctor of Doom (R,S,A) ', 40, 1979, '01:45:00', 6000000, 25000, 4, 1225000),
(293, 'The Island of Doctor Agor (R)', 41, 1971, '01:50:00', 125000, 2560000, 5, 1250000),
(294, 'Le Ciel, les oiseaux et... ta m?re !', 42, 1999, '02:05:00', 35000, 1625000, 6, 1275000),
(295, 'Le Raid', 1, 2002, '01:55:00', 658000, 950000, 7, 1300000),
(296, 'Il ?tait une fois dans l oued', 2, 2005, '01:35:00', 950000, 135000, 8, 1325000),
(297, 'Big City', 3, 2007, '01:45:00', 1250000, 950000, 9, 1350000),
(298, 'Neuilly sa m?re ! ', 4, 2009, '01:50:00', 1000000, 759000, 1, 1375000),
(299, 'Capitaine Khalid', 5, 2011, '02:05:00', 25000000, 658000, 1, 1400000),
(300, 'L Eau froide de Olivier Assayas', 6, 1994, '01:55:00', 12000000, 652000, 1, 1425000),
(301, 'Agathe Cl?ry de Etienne Chatiliez', 7, 2008, '01:35:00', 6000000, 1250000, 2, 1450000),
(302, 'Le Coup de sirocco', 8, 1979, '01:45:00', 125000, 25000, 2, 1475000),
(303, 'Le Grand Pardon', 9, 1982, '01:50:00', 35000, 2560000, 2, 1500000),
(304, 'Le Grand Carnaval', 10, 1983, '02:05:00', 658000, 1625000, 3, 1525000),
(305, 'Hold-up', 11, 1985, '01:55:00', 950000, 950000, 3, 1550000),
(306, 'Dernier ?t? ? Tanger', 12, 1986, '01:35:00', 1250000, 135000, 3, 1575000),
(307, 'L  Union sacr', 13, 1989, '01:45:00', 1000000, 950000, 4, 1600000),
(308, 'Pour Sacha', 14, 1991, '01:50:00', 25000000, 759000, 4, 1625000),
(309, 'Le Grand Pardon 2', 15, 1992, '02:05:00', 12000000, 658000, 4, 950000),
(310, 'Dis-moi oui', 16, 1995, '01:55:00', 6000000, 652000, 5, 975000),
(311, 'K', 17, 1997, '01:35:00', 125000, 1250000, 5, 1000000),
(312, 'L?-bas... mon pays', 18, 1999, '01:45:00', 35000, 25000, 5, 1025000),
(313, 'Entre chiens et loups', 19, 2002, '01:50:00', 658000, 2560000, 6, 1050000),
(314, 'Mariage mixte', 20, 2004, '02:05:00', 950000, 1625000, 6, 1075000),
(315, 'Tu peux garder un secret ?', 21, 2008, '01:55:00', 1250000, 950000, 7, 1100000),
(316, 'Comme les 5 doigts de la main', 22, 2010, '01:35:00', 1000000, 135000, 7, 1125000);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `numgenre` tinyint(3) UNSIGNED NOT NULL,
  `libellegenre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`numgenre`, `libellegenre`) VALUES
(1, 'Com?die'),
(2, 'Burlesque'),
(3, 'Com?die de m?urs'),
(4, 'Com?die dramatique'),
(5, 'Com?die polici?re'),
(6, 'Com?die romantique'),
(7, 'Parodie'),
(8, 'Screwball comedy'),
(9, 'Conte'),
(10, 'Drame'),
(11, 'M?lodrame'),
(12, 'Film ? sketches'),
(13, 'Film ? suspense'),
(14, 'Film d action'),
(15, 'Film d animation'),
(16, 'Film d aventure'),
(17, 'Film de cape et d ?p'),
(18, 'Film catastrophe'),
(19, 'Film documentaire'),
(20, 'Film ?rotique'),
(21, 'Film d espionnage'),
(22, 'Film d exploitation'),
(23, 'Film fantastique'),
(24, 'Vampirisme'),
(25, 'Film de zombie'),
(26, 'Film de guerre'),
(27, 'Film historique'),
(28, 'Film biographique'),
(29, 'Film autobiographique'),
(30, 'P?plum'),
(31, 'Film d horreur'),
(32, 'Film musical'),
(33, 'Film policier'),
(34, 'Film de gangster'),
(35, 'Film noir'),
(36, 'Film pour adolescent'),
(37, 'Road movie'),
(38, 'Romance'),
(39, 'Science-fiction'),
(40, 'S?rial'),
(41, 'Thriller'),
(42, 'Western');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `numpersonne` mediumint(8) UNSIGNED NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `datenais` date DEFAULT NULL,
  `nationalite` varchar(20) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(15) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`numpersonne`, `prenom`, `nom`, `datenais`, `nationalite`, `adresse`, `cp`, `ville`, `telephone`) VALUES
(1, 'Martin', 'Scorsese', '1943-01-03', 'Am?riciane', '5?me avenue', NULL, 'New York', NULL),
(2, 'Quentin', 'Tarantino', '1967-08-15', 'Am?riciane', '6?me avenue', NULL, 'Miami', NULL),
(3, 'Clint', 'Eastwood', '1935-03-25', 'Am?riciane', '7?me avenue', NULL, 'New York', NULL),
(4, 'Steven', 'Spielberg', '1939-04-02', 'Am?riciane', '8?me avenue', NULL, 'Miami', NULL),
(5, 'David', 'Lynch', '1946-08-04', 'Am?riciane', '9?me avenue', NULL, 'Washington', NULL),
(6, 'Sofia', 'Coppola', '1952-06-21', 'Am?riciane', '10?me avenue', NULL, 'Miami', NULL),
(7, 'Brian', 'De-Palma', '1940-03-13', 'Am?riciane', '11?me avenue', NULL, 'Boston', NULL),
(8, 'Night', 'Shyamalan', '1970-11-21', 'Am?riciane', '12?me avenue', NULL, 'San francisco', NULL),
(9, 'Tim', 'Burton', '1951-01-25', 'Am?riciane', '13?me avenue', NULL, 'San francisco', NULL),
(10, 'Djamel', 'Bensalah', '1970-12-11', 'Fran?ais', '25, avenue Foch', '69006', 'Lyon', '0472729898'),
(11, 'Alexandre', 'Arcady', '1954-03-31', 'Hongrois', '11, rue Gabriel P?ri', '92120', 'Montrouge', '0149651203'),
(12, 'Raymond', 'Bernard', '1893-05-01', 'Fran?ais', '12, place Vendome', '75016', 'Paris', '0146985214'),
(13, 'Ducrozet', 'Pierre', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'z', 'z', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'eey', 'y', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'zzzzzzzzzzs', 'ssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'zzzzzzzzzzs', 'xxxxxxxs', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'i', 'Pierre', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'CW', 'ERV', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'CW', 'ERVaaaaaaaaa', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Spontak', 'Antonin', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `programmation`
--

CREATE TABLE `programmation` (
  `NumFilm` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `NumCinema` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `NumSalle` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `Date_Deb` date NOT NULL DEFAULT '0000-00-00',
  `Date_fin` date DEFAULT NULL,
  `Horaire` time DEFAULT NULL,
  `Prix` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `programmation`
--

INSERT INTO `programmation` (`NumFilm`, `NumCinema`, `NumSalle`, `Date_Deb`, `Date_fin`, `Horaire`, `Prix`) VALUES
(12, 1, 1, '2011-02-13', '2011-02-20', '12:00:00', '12.00'),
(12, 5, 1, '2011-02-21', '2011-02-28', '18:00:00', '12.00'),
(12, 10, 1, '2011-02-27', '2011-03-06', '20:00:00', '12.00'),
(14, 1, 2, '2011-02-14', '2011-02-21', '14:00:00', '12.00'),
(14, 5, 2, '2011-02-22', '2011-03-01', '20:00:00', '12.00'),
(14, 10, 2, '2011-02-28', '2011-03-07', '12:00:00', '12.00'),
(16, 1, 3, '2011-02-15', '2011-02-22', '16:00:00', '12.00'),
(16, 5, 3, '2011-02-23', '2011-03-02', '12:00:00', '12.00'),
(16, 10, 3, '2011-03-01', '2011-03-08', '14:00:00', '12.00'),
(18, 1, 4, '2011-02-16', '2011-02-23', '18:00:00', '12.00'),
(18, 5, 4, '2011-02-24', '2011-03-03', '14:00:00', '12.00'),
(18, 10, 4, '2011-03-02', '2011-03-09', '16:00:00', '12.00'),
(20, 1, 5, '2011-02-17', '2011-02-24', '20:00:00', '12.00'),
(20, 5, 5, '2011-02-25', '2011-03-04', '16:00:00', '12.00'),
(20, 10, 5, '2011-03-03', '2011-03-10', '18:00:00', '12.00'),
(21, 25, 1, '2011-03-08', '2011-03-15', '18:00:00', '12.00'),
(21, 31, 1, '2011-03-14', '2011-03-21', '20:00:00', '12.00'),
(21, 65, 3, '2011-03-20', '2011-03-27', '12:00:00', '12.00'),
(22, 1, 6, '2011-02-18', '2011-02-25', '12:00:00', '12.00'),
(22, 5, 6, '2011-02-26', '2011-03-05', '18:00:00', '12.00'),
(22, 10, 6, '2011-03-04', '2011-03-11', '20:00:00', '12.00'),
(23, 25, 2, '2011-03-09', '2011-03-16', '20:00:00', '12.00'),
(23, 31, 2, '2011-03-15', '2011-03-22', '12:00:00', '12.00'),
(23, 65, 4, '2011-03-21', '2011-03-28', '14:00:00', '12.00'),
(23, 91, 6, '2011-03-29', '2011-04-05', '20:00:00', '12.00'),
(23, 250, 3, '2011-04-23', '2011-04-30', '20:00:00', '12.00'),
(23, 319, 1, '2011-04-07', '2011-04-14', '18:00:00', '12.00'),
(23, 320, 1, '2011-04-14', '2011-04-21', '12:00:00', '12.00'),
(24, 1, 7, '2011-02-19', '2011-02-26', '14:00:00', '12.00'),
(24, 10, 7, '2011-03-05', '2011-03-12', '12:00:00', '12.00'),
(25, 25, 3, '2011-03-10', '2011-03-17', '12:00:00', '12.00'),
(25, 31, 3, '2011-03-16', '2011-03-23', '14:00:00', '12.00'),
(25, 65, 5, '2011-03-22', '2011-03-29', '16:00:00', '12.00'),
(25, 110, 1, '2011-03-30', '2011-04-06', '12:00:00', '12.00'),
(25, 250, 4, '2011-04-24', '2011-05-01', '12:00:00', '12.00'),
(25, 319, 2, '2011-04-08', '2011-04-15', '20:00:00', '12.00'),
(25, 320, 2, '2011-04-15', '2011-04-22', '14:00:00', '12.00'),
(26, 1, 8, '2011-02-20', '2011-02-27', '16:00:00', '12.00'),
(26, 10, 8, '2011-03-06', '2011-03-13', '14:00:00', '12.00'),
(27, 25, 4, '2011-03-11', '2011-03-18', '14:00:00', '12.00'),
(27, 31, 4, '2011-03-17', '2011-03-24', '16:00:00', '12.00'),
(27, 65, 6, '2011-03-23', '2011-03-30', '18:00:00', '12.00'),
(27, 110, 2, '2011-03-31', '2011-04-07', '14:00:00', '12.00'),
(27, 250, 5, '2011-04-25', '2011-05-02', '14:00:00', '12.00'),
(27, 319, 3, '2011-04-09', '2011-04-16', '12:00:00', '12.00'),
(27, 320, 3, '2011-04-16', '2011-04-23', '16:00:00', '12.00'),
(28, 10, 9, '2011-03-07', '2011-03-14', '16:00:00', '12.00'),
(29, 25, 5, '2011-03-12', '2011-03-19', '16:00:00', '12.00'),
(29, 65, 1, '2011-03-18', '2011-03-25', '18:00:00', '12.00'),
(29, 91, 1, '2011-03-24', '2011-03-31', '20:00:00', '12.00'),
(29, 110, 3, '2011-04-01', '2011-04-08', '16:00:00', '12.00'),
(29, 250, 6, '2011-04-26', '2011-05-03', '16:00:00', '12.00'),
(29, 319, 4, '2011-04-10', '2011-04-17', '14:00:00', '12.00'),
(29, 320, 4, '2011-04-17', '2011-04-24', '18:00:00', '12.00'),
(31, 25, 6, '2011-03-13', '2011-03-20', '18:00:00', '12.00'),
(31, 65, 2, '2011-03-19', '2011-03-26', '20:00:00', '12.00'),
(31, 91, 2, '2011-03-25', '2011-04-01', '12:00:00', '12.00'),
(31, 110, 4, '2011-04-02', '2011-04-09', '18:00:00', '12.00'),
(31, 250, 7, '2011-04-27', '2011-05-04', '18:00:00', '12.00'),
(31, 319, 5, '2011-04-11', '2011-04-18', '16:00:00', '12.00'),
(31, 320, 5, '2011-04-18', '2011-04-25', '20:00:00', '12.00'),
(33, 91, 3, '2011-03-26', '2011-04-02', '14:00:00', '12.00'),
(33, 110, 5, '2011-04-03', '2011-04-10', '20:00:00', '12.00'),
(33, 319, 6, '2011-04-12', '2011-04-19', '18:00:00', '12.00'),
(33, 320, 6, '2011-04-19', '2011-04-26', '12:00:00', '12.00'),
(35, 91, 4, '2011-03-27', '2011-04-03', '16:00:00', '12.00'),
(35, 110, 6, '2011-04-04', '2011-04-11', '12:00:00', '12.00'),
(35, 319, 7, '2011-04-13', '2011-04-20', '20:00:00', '12.00'),
(35, 320, 7, '2011-04-20', '2011-04-27', '14:00:00', '12.00'),
(37, 91, 5, '2011-03-28', '2011-04-04', '18:00:00', '12.00'),
(37, 110, 7, '2011-04-05', '2011-04-12', '14:00:00', '12.00'),
(37, 250, 1, '2011-04-21', '2011-04-28', '16:00:00', '12.00'),
(39, 110, 8, '2011-04-06', '2011-04-13', '16:00:00', '12.00'),
(39, 250, 2, '2011-04-22', '2011-04-29', '18:00:00', '12.00');

-- --------------------------------------------------------

--
-- Structure de la table `revisions`
--

CREATE TABLE `revisions` (
  `nom` varchar(20) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `matiere` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `NumCinema` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `NumSalle` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `TailleEcran` tinyint(3) UNSIGNED DEFAULT NULL,
  `NbPlaces` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`NumCinema`, `NumSalle`, `TailleEcran`, `NbPlaces`) VALUES
(1, 1, 10, 1600),
(1, 2, 12, 1800),
(1, 3, 14, 2000),
(1, 4, 16, 2200),
(1, 5, 18, 2400),
(1, 6, 20, 2600),
(1, 7, 22, 2800),
(1, 8, 24, 3000),
(5, 1, 10, 1600),
(5, 2, 12, 1800),
(5, 3, 14, 2000),
(5, 4, 16, 2200),
(5, 5, 18, 2400),
(5, 6, 20, 2600),
(10, 1, 22, 2800),
(10, 2, 24, 3000),
(10, 3, 10, 1600),
(10, 4, 12, 1800),
(10, 5, 14, 2000),
(10, 6, 16, 2200),
(10, 7, 18, 2400),
(10, 8, 20, 2600),
(10, 9, 22, 2800),
(25, 1, 24, 3000),
(25, 2, 10, 1600),
(25, 3, 12, 1800),
(25, 4, 14, 2000),
(25, 5, 16, 2200),
(25, 6, 18, 2400),
(31, 1, 20, 2600),
(31, 2, 22, 2800),
(31, 3, 24, 3000),
(31, 4, 10, 1600),
(65, 1, 12, 1800),
(65, 2, 14, 2000),
(65, 3, 16, 2200),
(65, 4, 18, 2400),
(65, 5, 20, 2600),
(65, 6, 22, 2800),
(91, 1, 24, 3000),
(91, 2, 10, 1600),
(91, 3, 12, 1800),
(91, 4, 14, 2000),
(91, 5, 16, 2200),
(91, 6, 18, 2400),
(110, 1, 20, 2600),
(110, 2, 22, 2800),
(110, 3, 24, 3000),
(110, 4, 10, 1600),
(110, 5, 12, 1800),
(110, 6, 14, 2000),
(110, 7, 16, 2200),
(110, 8, 18, 2400),
(250, 1, 16, 2200),
(250, 2, 18, 2400),
(250, 3, 20, 2600),
(250, 4, 22, 2800),
(250, 5, 24, 3000),
(250, 6, 10, 1650),
(250, 7, 12, 1500),
(319, 1, 20, 2600),
(319, 2, 22, 2800),
(319, 3, 24, 3000),
(319, 4, 10, 1600),
(319, 5, 12, 1800),
(319, 6, 14, 2000),
(319, 7, 16, 2200),
(320, 1, 18, 2400),
(320, 2, 20, 2600),
(320, 3, 22, 2800),
(320, 4, 24, 3000),
(320, 5, 10, 1600),
(320, 6, 12, 1800),
(320, 7, 14, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `matiere` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `cours` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `nom`, `prenom`, `semestre`, `matiere`, `titre`, `cours`) VALUES
(0, 'AAAAAAAAAAAA', 'AAAAAAAAAAAAAAA', 'Semestre 1', 'Mathématiques', 'AAAAAAAAAAAAAA', 'AAAAAAAAAAAAAAAAA');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`NumActeur`),
  ADD KEY `FK_acteur_personne` (`NumPersonne`),
  ADD KEY `FK_acteur_agent` (`Agent`),
  ADD KEY `FK_acteur_genre` (`Specialite`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`numcinema`);

--
-- Index pour la table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`NumFilm`,`NumActeur`,`role`),
  ADD KEY `FK_distribution_acteur` (`NumActeur`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`Numfilm`),
  ADD KEY `FK_film_personne` (`Realisateur`),
  ADD KEY `FK_film_genre` (`Genre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`numgenre`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`numpersonne`);

--
-- Index pour la table `programmation`
--
ALTER TABLE `programmation`
  ADD PRIMARY KEY (`NumFilm`,`NumCinema`,`NumSalle`,`Date_Deb`),
  ADD KEY `FK_programmation_salle` (`NumCinema`,`NumSalle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`NumCinema`,`NumSalle`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `FK_acteur_agent` FOREIGN KEY (`Agent`) REFERENCES `personne` (`numpersonne`),
  ADD CONSTRAINT `FK_acteur_genre` FOREIGN KEY (`Specialite`) REFERENCES `genre` (`numgenre`),
  ADD CONSTRAINT `FK_acteur_personne` FOREIGN KEY (`NumPersonne`) REFERENCES `personne` (`numpersonne`);

--
-- Contraintes pour la table `distribution`
--
ALTER TABLE `distribution`
  ADD CONSTRAINT `FK_distribution_acteur` FOREIGN KEY (`NumActeur`) REFERENCES `acteur` (`NumActeur`),
  ADD CONSTRAINT `FK_distribution_film` FOREIGN KEY (`NumFilm`) REFERENCES `film` (`Numfilm`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_film_genre` FOREIGN KEY (`Genre`) REFERENCES `genre` (`numgenre`),
  ADD CONSTRAINT `FK_film_personne` FOREIGN KEY (`Realisateur`) REFERENCES `personne` (`numpersonne`);

--
-- Contraintes pour la table `programmation`
--
ALTER TABLE `programmation`
  ADD CONSTRAINT `FK_programmation_film` FOREIGN KEY (`NumFilm`) REFERENCES `film` (`Numfilm`),
  ADD CONSTRAINT `FK_programmation_salle` FOREIGN KEY (`NumCinema`,`NumSalle`) REFERENCES `salle` (`NumCinema`, `NumSalle`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_salle_cinema` FOREIGN KEY (`NumCinema`) REFERENCES `cinema` (`numcinema`);
--
-- Base de données :  `ptut`
--
CREATE DATABASE IF NOT EXISTS `ptut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ptut`;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `Semestre` varchar(20) NOT NULL,
  `matiere` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `cours` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `nom`, `prenom`, `Semestre`, `matiere`, `titre`, `cours`) VALUES
(1, 'ducrozet', 'pierre', 'semestre 1', 'anglais', 'aaaa', 'aaaaaaaaaaa'),
(2, 'bb', 'bbb', 'Semestre 4', 'Mathématiques', 'kkk', 'ee'),
(4, '', 'bbb', 'Semestre 4', 'Mathématiques', 'kkk', 'ee');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Base de données :  `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `id` int(11) NOT NULL,
  `matière` varchar(30) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`nom`, `prenom`, `naissance`, `id`, `matière`, `note`) VALUES
('Parker', 'Tony', '1982-05-17', 2, 'Mathématiques', '14'),
('Diaw', 'Boris', '1982-04-16', 3, 'Français, Géographie ', '16, 18'),
('Batum', 'Nicolas', '1988-12-14', 4, 'Histoire', '18'),
('Gobert', 'Rudy', '1992-06-26', 9, 'Anglais', '19'),
('Collet', 'Vincent', '1987-12-21', 11, 'SVT', '15');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nom_prenom_naissance` (`nom`,`prenom`,`naissance`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;--
-- Base de données :  `ubitransport`
--
CREATE DATABASE IF NOT EXISTS `ubitransport` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ubitransport`;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `id` int(11) NOT NULL,
  `matière` varchar(30) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`nom`, `prenom`, `naissance`, `id`, `matière`, `note`) VALUES
('Parker', 'Tony', '1982-05-17', 2, 'Mathématiques', '14'),
('Diaw', 'Boris', '1982-04-16', 3, 'Français, Géographie ', '16, 18'),
('Batum', 'Nicolas', '1988-12-14', 4, 'Histoire', '18'),
('Gobert', 'Rudy', '1992-06-26', 9, 'Anglais', '19'),
('Collet', 'Vincent', '1987-12-21', 11, 'SVT', '15');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nom_prenom_naissance` (`nom`,`prenom`,`naissance`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
