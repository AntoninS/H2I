DROP TABLE IF EXISTS `emploiDuTemps`, `personne`, `etudiant`, `professeur`, `tuteur`, `matiere`, `coursTutorat` ;
-- problème des vacances, comment faire pour gerer automatiquement les vacances ?
CREATE TABLE emploiDuTemps (
	dateJour DATE PRIMARY KEY,
    heure TIME,
	cours INT(30) UNSIGNED

	-- ajouter système booleen pour vacances

) Engine=InnoDB;        -- Moteur de stockage, obligatoire pour clés primaires / étrangères


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

    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;



CREATE TABLE tuteur (
	id VARCHAR(8) PRIMARY KEY,

    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB; 


CREATE TABLE matiere (
	nomMatiere VARCHAR(30) PRIMARY KEY

) ENGINE=InnoDB;

CREATE TABLE coursTutorat (
	id INT(30) UNSIGNED PRIMARY KEY AUTO_INCREMENT, -- On peut lui donner un nombre qui s'auto incrémente a la création d'un cours
	nomMatiere VARCHAR(30),
    dateCours DATE,
    heureDebut TIME,
    heureFin TIME default NULL,
    duree TIME default NULL,
    tuteur VARCHAR(8),
    eleve VARCHAR(8),
	salle VARCHAR(8),

    FOREIGN KEY(dateCours) REFERENCES emploiDuTemps(dateJour),
    -- comment gerer heure début ?
    FOREIGN KEY(nomMatiere) REFERENCES matiere(nomMatiere),
    FOREIGN KEY(tuteur) REFERENCES tuteur(id),
    FOREIGN KEY(eleve) REFERENCES etudiant(id)

) ENGINE=InnoDB;

ALTER TABLE emploiDuTemps 
ADD FOREIGN KEY(cours) REFERENCES coursTutorat(id);   -- Ajout ici de la clé etrangere de la table emploiDuTemps, sinon ça nug étant donné que la table pere existe pas encore au moment de la creation de emploiDuTemps
