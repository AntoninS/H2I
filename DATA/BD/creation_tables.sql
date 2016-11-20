DROP TABLE IF EXISTS `personne`, `etudiant`, `professeur`, `tuteur`, `matiere`, `coursTutorat` ;
-- problème des vacances, comment faire pour gerer automatiquement les vacances ?

--
-- Structure de la table `courstutorat`
--

CREATE TABLE `courstutorat` (
  `id` int(30) UNSIGNED NOT NULL,
  `nomMatiere` varchar(30) DEFAULT NULL,
  `jour` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time NOT NULL,
  `tuteur` varchar(8) DEFAULT NULL,
  `eleve` varchar(8) DEFAULT NULL,
  `salle` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `courstutorat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomMatiere` (`nomMatiere`),
  ADD KEY `tuteur` (`tuteur`),
  ADD KEY `eleve` (`eleve`);

ALTER TABLE `courstutorat`
	MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `courstutorat`
  ADD CONSTRAINT `courstutorat_ibfk_1` FOREIGN KEY (`nomMatiere`) REFERENCES `matiere` (`nomMatiere`),
  ADD CONSTRAINT `courstutorat_ibfk_2` FOREIGN KEY (`tuteur`) REFERENCES `tuteur` (`id`),
  ADD CONSTRAINT `courstutorat_ibfk_3` FOREIGN KEY (`eleve`) REFERENCES `etudiant` (`id`);

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `idCoursTutorat` int(30) UNSIGNED NOT NULL,
  `numeroSemaine` int(2) UNSIGNED NOT NULL,
  `creneau` int(11) NOT NULL,
  `lundi` varchar(30) NOT NULL,
  `mardi` varchar(30) NOT NULL,
  `mercredi` varchar(30) NOT NULL,
  `jeudi` varchar(30) NOT NULL,
  `vendredi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `horaire`
	ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`idCoursTutorat`) REFERENCES `coursTutorat` (`id`);

/* exemple insertion :

update horaire
set lundi = (select coursTutorat.nomMatiere from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
where numeroSemaine = WEEK(select coursTutorat.jour from coursTutorat where coursTutorat.id=horaire.idCoursTutorat)
and creneau = heureDebut + heureFin
and idCoursTutorat = var pour l'id

*/

/* exemple selection semaine :
select creneau, lundi, mardi, mercredi, jeudi, vendredi from horaire
where numeroSemaine = varSemaine*/


--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL,
  `auteurID` int(11) NOT NULL,
  `sujetID` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateMessage` datetime NOT NULL,
  `messageValide` tinyint(1) NOT NULL,
  `premierMessage` tinyint(1) NOT NULL,
  `modification` datetime DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `module` (
  `moduleID` int(11) NOT NULL,
  `nomModule` varchar(255) NOT NULL,
  `semestre` int(11) NOT NULL,
  `enseignant` varchar(255) DEFAULT NULL,
  `nbEpingle` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`moduleID`, `nomModule`, `semestre`, `enseignant`, `nbEpingle`) VALUES
(3, 'Probabilités et Statistiques', 3, 'Aude Joubert', 0),
(4, 'Communication S1', 1, 'test', 1),
(5, 'Programmation C', 1, 'test', 0),
(6, 'Programmation Java', 2, NULL, 0),
(7, 'Communication S2', 2, NULL, 0),
(8, 'Communication S3', 3, NULL, 0),
(9, 'Communication S4', 4, NULL, 0),
(10, 'BDA', 4, NULL, 0),
(11, 'Algo avancé', 4, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
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
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`sujetID`, `nom`, `auteurID`, `moduleID`, `message`, `dateSujet`, `epingle`, `clos`, `messageValide`, `nbVues`, `nbRep`, `priority`, `dernierMessage`, `pseudo`, `dateDernierChangement`) VALUES
(150, 'Sujet 1', 1, 4, 'Message sujet 1', '2016-11-20 18:36:00', 0, 0, NULL, 7, 3, 2, 279, 'Laurent', '2016-11-20 18:43:55'),
(151, 'Sujet 2 ', 1, 4, 'Message sujet 2', '2016-11-20 18:36:18', 0, 0, NULL, 16, 2, 1, 277, 'Antonin', '2016-11-20 18:46:14'),
(152, 'Sujet 3 ', 1, 4, 'Message sujet 3', '2016-11-20 18:36:31', 1, 0, NULL, 14, 2, 2, 278, 'Pierre', '2016-11-20 18:46:05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateurID` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurID`, `identifiant`, `motDePasse`, `prenom`, `pseudo`, `statut`) VALUES
(1, 'p1505454', 'IUTinformatique69', 'Laurent', 'Laurent', 'Tuteur'),
(2, 'test', 'test', 'Antonin', 'Antonin', 'Admin'),
(3, 'p1506593', 'test', 'Maxime', 'Maxime', 'Superuser'),
(4, 'p1506391', 'test', 'Mihajlo', 'Miki', 'Enseignant');

--
-- Index pour les tables exportées
--

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
  ADD KEY `enseignant` (`enseignant`);

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
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `sujetID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `utilisateurID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_auteurmessageid` FOREIGN KEY (`auteurID`) REFERENCES `utilisateurs` (`utilisateurID`),
  ADD CONSTRAINT `fk_sujetid` FOREIGN KEY (`sujetID`) REFERENCES `sujet` (`sujetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `fk_auteurid` FOREIGN KEY (`auteurID`) REFERENCES `utilisateurs` (`utilisateurID`),
  ADD CONSTRAINT `fk_derniermessage` FOREIGN KEY (`dernierMessage`) REFERENCES `message` (`messageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_moduleid` FOREIGN KEY (`moduleID`) REFERENCES `module` (`moduleID`);
