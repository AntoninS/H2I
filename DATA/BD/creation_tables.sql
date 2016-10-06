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

CREATE TABLE coursTutorat (
	id INT(30) UNSIGNED PRIMARY KEY AUTO_INCREMENT, -- On peut lui donner un nombre qui s'auto incrémente à la création d'un cours
	nomMatiere VARCHAR(30),
  debut DATETIME,
  fin DATETIME,
  tuteur VARCHAR(8),
  eleve VARCHAR(8),
	salle VARCHAR(8),
	INDEX idx_start (`debut`),
  INDEX idx_end (`fin`),

  FOREIGN KEY(nomMatiere) REFERENCES matiere(nomMatiere),
  FOREIGN KEY(tuteur) REFERENCES tuteur(id),
  FOREIGN KEY(eleve) REFERENCES etudiant(id)

) ENGINE=InnoDB;
