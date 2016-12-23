-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Décembre 2016 à 12:24
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `h2i_iut`
--

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
(1, 'Programmation C', '2016-12-23', '08:00:00', '10:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...');

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
  `nbEpingle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`moduleID`, `nomModule`, `semestre`, `enseignant`, `tuteur`, `nbEpingle`) VALUES
(3, 'Probabilités et Statistiques', 3, 'Aude Joubert', NULL, 0),
(4, 'Communication S1', 1, 'test', NULL, 1),
(5, 'Programmation C', 1, 'test', 3, 0),
(6, 'Programmation Java', 2, NULL, NULL, 0),
(7, 'Communication S2', 2, NULL, NULL, 0),
(8, 'Communication S3', 3, NULL, NULL, 0),
(9, 'Communication S4', 4, NULL, NULL, 0),
(10, 'BDA', 4, NULL, 3, 0),
(11, 'Algo avancé', 4, NULL, NULL, 0);

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
(2016, 51, 8, NULL, NULL, NULL, NULL, 1),
(2016, 51, 9, NULL, NULL, NULL, NULL, 1),
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
(2016, 52, 11, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 12, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 13, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 14, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 15, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 16, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 17, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 18, NULL, NULL, NULL, NULL, NULL),
(2016, 52, 19, NULL, NULL, NULL, NULL, NULL);

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
(151, 'Sujet 2 ', 1, 4, 'Message sujet 2', '2016-11-20 18:36:18', 0, 0, NULL, 17, 2, 1, 277, 'Antonin', '2016-11-20 18:46:14'),
(152, 'Sujet 3 ', 1, 4, 'Message sujet 3', '2016-11-20 18:36:31', 1, 0, NULL, 14, 2, 2, 278, 'Pierre', '2016-11-20 18:46:05');

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
(4, 'p1506391', 'test', 'Mihajlo', 'Miki', 'Enseignant');

--
-- Index pour les tables exportées
--

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
-- AUTO_INCREMENT pour la table `courstutorat`
--
ALTER TABLE `courstutorat`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `sujetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
