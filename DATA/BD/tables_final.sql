-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Janvier 2017 à 11:17
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
(5, 'Programmation C', '2016-12-28', '11:00:00', '13:00:00', 3, 2, NULL, NULL, NULL, 'S13', 'Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `GroupeID` int(11) NOT NULL,
  `NomGroupe` varchar(2) NOT NULL,
  `Semestre` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`GroupeID`, `NomGroupe`, `Semestre`) VALUES
(1, 'G1', 3),
(2, 'G1', 2),
(3, 'G1', 4),
(5, 'G1', 1);

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
  `Coefficient` float NOT NULL,
  `tuteur` int(11) DEFAULT NULL,
  `nbEpingle` int(11) NOT NULL DEFAULT '0',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`moduleID`, `nomModule`, `semestre`, `Coefficient`, `tuteur`, `nbEpingle`, `image`) VALUES
(3, 'Probabilités et Statistiques', 3, 2.5, NULL, 0, 'iconmaths'),
(4, 'Communication ', 1, 0, NULL, 1, 'iconcom'),
(5, 'Programmation C', 1, 0, 3, 0, 'iconc'),
(6, 'Programmation Java', 2, 0, NULL, 0, 'iconjava'),
(7, 'Communication', 2, 0, NULL, 0, 'iconcom'),
(8, 'Communication', 3, 1.5, NULL, 0, 'iconcom'),
(9, 'Communication', 4, 0, NULL, 0, 'iconcom'),
(10, 'BDA', 3, 1.5, 3, 0, 'iconsql'),
(11, 'Algo avancé', 4, 0, NULL, 0, 'iconalgo'),
(12, 'SE cours ', 3, 1.5, NULL, 0, 'iconwindows'),
(13, 'SE TP', 3, 1, NULL, 0, 'iconlinux'),
(14, 'Réseau', 3, 1.5, NULL, 0, 'iconreseau'),
(15, 'Algo avancée', 3, 1.5, NULL, 0, 'iconalgo'),
(16, 'PHP', 3, 1.5, NULL, 0, 'iconphp'),
(17, 'CPOA', 3, 2.5, NULL, 0, 'iconcpoa'),
(18, 'Modélisation mathématiques', 3, 1.5, NULL, 0, 'iconmaths'),
(19, 'TIC Droit', 3, 1.5, NULL, 0, 'icondroit'),
(20, 'GSI 1', 3, 1.3, NULL, 0, 'icongsi'),
(21, 'GSI 2', 3, 1.2, NULL, 0, 'icongsi'),
(22, 'Anglais', 0, 2.5, NULL, 3, 'iconenglish');

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
(2017, 1, 8, NULL, NULL, NULL, NULL, NULL),
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
(2017, 3, 8, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 9, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 10, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 11, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 12, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 13, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 14, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 15, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 16, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 17, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 18, NULL, NULL, NULL, NULL, NULL),
(2017, 3, 19, NULL, NULL, NULL, NULL, NULL);

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
  `groupeID` int(11) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `avatar` varchar(123) NOT NULL DEFAULT 'USR',
  `public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurID`, `identifiant`, `motDePasse`, `groupeID`, `prenom`, `nom`, `pseudo`, `mail`, `tel`, `statut`, `avatar`, `public`) VALUES
(1, 'p1505454', 'IUTinformatique69', 3, 'Laurent', '', 'Laurent', NULL, NULL, 'Tuteur', 'USR', 0),
(2, 'test', 'test', 1, 'Antonin', '', 'Antonin', NULL, NULL, 'Admin', 'USR', 0),
(3, 'p1506593', 'test', 4, 'Maxime', '', 'Maxime', NULL, NULL, 'Superuser', 'USR', 0),
(4, 'p1506391', 'test', 4, 'Mihajlo', '', 'Miki', NULL, NULL, 'Enseignant', 'USR', 0),
(5, 'p1506213', '$2y$10$jk8nAn2zavOwnZk19pua8uFMQ6u0O/2YMQ4VrqWwERt8behjez6Bi', 5, 'Bastien', 'Chabal', 'Laurentfdp', '', '', 'Tuteur', 'USR', 0),
(6, 'p124230', '$2y$10$hcl.psKiA4xrabyWLH.aH.7hIgTV5eF1fF/0xh6ZN7BSv9MOAENv2', 2, 'bastien', 'chabal', 'test', '', '', 'Etudiant', 'USR', 0);

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
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`GroupeID`);

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
  ADD KEY `tuteur` (`tuteur`);

--
-- Index pour la table `planningtutorat`
--
ALTER TABLE `planningtutorat`
  ADD KEY `lundi` (`lundi`),
  ADD KEY `mardi` (`mardi`),
  ADD KEY `mercredi` (`mercredi`),
  ADD KEY `jeudi` (`jeudi`),
  ADD KEY `vendredi` (`vendredi`),
  ADD KEY `lundi_2` (`lundi`,`mardi`,`mercredi`,`jeudi`,`vendredi`);

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
  ADD PRIMARY KEY (`utilisateurID`),
  ADD KEY `groupeID` (`groupeID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `courstutorat`
--
ALTER TABLE `courstutorat`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `GroupeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `sujetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`GroupeID`) REFERENCES `utilisateurs` (`groupeID`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_tuteur` FOREIGN KEY (`tuteur`) REFERENCES `utilisateurs` (`utilisateurID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `planningtutorat`
--
ALTER TABLE `planningtutorat`
  ADD CONSTRAINT `fk_jeudi_courstutorat` FOREIGN KEY (`jeudi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lundi_courstutorat` FOREIGN KEY (`lundi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mardi_courstutorat` FOREIGN KEY (`mardi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mercredi_courstutorat` FOREIGN KEY (`mercredi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vendredi_courstutorat` FOREIGN KEY (`vendredi`) REFERENCES `courstutorat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
