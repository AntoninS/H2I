DROP TABLE IF EXISTS `personne`, `etudiant`, `professeur`, `tuteur`, `matiere`, `coursTutorat` ;
-- problème des vacances, comment faire pour gerer automatiquement les vacances ?

CREATE TABLE personne (
	id VARCHAR(8) PRIMARY KEY, -- p15*****
	nom VARCHAR(20),
	prenom VARCHAR(20)

) Engine=InnoDB ;


CREATE TABLE etudiant (
	id VARCHAR(8) PRIMARY KEY,
  classe VARCHAR(4),

  FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE professeur (
	id VARCHAR(8) PRIMARY KEY,
	-- matieres enseignées ?
    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE tuteur (
	id VARCHAR(8) PRIMARY KEY,
	-- Matières enseignées ?
    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE matiere (
	nomMatiere VARCHAR(30) PRIMARY KEY

) ENGINE=InnoDB;

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
where numeroSemaine = varSemaine
