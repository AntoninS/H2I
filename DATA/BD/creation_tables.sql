DROP DATABASE IF EXISTS h2i;
CREATE DATABASE h2i;

DROP TABLE IF EXISTS emploiDuTemps;
-- problème des vacances, comment faire pour gerer automatiquement les vacances ?
CREATE TABLE emploiDuTemps (
	dateJour DATE NOT NULL,
    heure TIME default NULL,
	cours VARCHAR(20),

	-- ajouter système booleen pour vacances

	PRIMARY KEY(dateJour)
		-- FOREIGN KEY(cours) REFERENCES coursTutorat(id)


) Engine=InnoDB;        -- Moteur de stockage, obligatoire pour clés primaires / étrangères

DROP TABLE IF EXISTS personne;
CREATE TABLE personne (
	id VARCHAR(8), -- p15*****
	nom VARCHAR(20),
	prenom VARCHAR(20),

	PRIMARY KEY(id)

) Engine=InnoDB ;

DROP TABLE IF EXISTS etudiant;
CREATE TABLE etudiant (
	id VARCHAR(8),
    classe VARCHAR(4),

    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;

DROP TABLE IF EXISTS professeur;
CREATE TABLE professeur (
	id VARCHAR(8),

    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;

DROP TABLE IF EXISTS tuteur;
CREATE TABLE tuteur (
	id VARCHAR(8),

    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;

DROP TABLE IF EXISTS matiere;
CREATE TABLE matiere (
	nomMatiere VARCHAR(30) PRIMARY KEY

) ENGINE=InnoDB;

DROP TABLE IF EXISTS coursTutorat;
CREATE TABLE coursTutorat (
	id INT PRIMARY KEY AUTO_INCREMENT, -- On peut lui donner un nombre qui s'auto incrémente a la crétaion d'un cours
	nomMatiere VARCHAR(30),
    dateCours DATE,
    heureDebut TIME default NULL,
    heureFin TIME default NULL,
    duree TIME default NULL,
    tuteur VARCHAR(8),
    eleve VARCHAR(8),
	salle VARCHAR(8),

    FOREIGN KEY(dateCours) REFERENCES emploiDuTemps(dateJour),
    FOREIGN KEY(heureDebut) REFERENCES emploiDuTemps(heure),
    FOREIGN KEY(nomMatiere) REFERENCES matiere(nomMatiere),
    FOREIGN KEY(tuteur) REFERENCES tuteur(id),
    FOREIGN KEY(eleve) REFERENCES etudiant(id)

) ENGINE=InnoDB;
