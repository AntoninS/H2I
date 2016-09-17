DROP TABLE IF EXISTS calendrier;

CREATE TABLE calendrier (
	id INT(12),            -- annee*100000000 + mois*1000000 + jour*10000 + heure
	date DATE NOT NULL,
	annee INT(4) default NULL,
	mois INT(2) default NULL,
	jour INT(2) default NULL,
	heure INT(4) default NULL,
	semaine INT NOT NULL,
	nom_jour VARCHAR(8) NOT NULL,
	nom_mois VARCHAR(9) NOT NULL,
	vacance_flag CHAR(1) DEFAULT 'n' CHECK ('vacance_flag' in ('o', 'n')), -- o = oui, n = non
	weekend_flag CHAR(1) DEFAULT 'n' CHECK ('weekend_flag' in ('o', 'n')),

	PRIMARY KEY(id),
	UNIQUE calendrier_amjh (annee,mois,jour,heure)

) Engine=InnoDB;        -- Moteur de stockage


CREATE TABLE personne (
	id VARCHAR(8), -- p15*****
	nom VARCHAR(20),
    prenom VARCHAR(20),

    PRIMARY KEY(id)

) Engine=InnoDB ;


CREATE TABLE etudiant (
	id VARCHAR(8),
    classe VARCHAR(4),

    CONSTRAINT fk_id_personne
    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE professeur (
	id VARCHAR(8),

    CONSTRAINT fk_id_personne
    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE tuteur (
	id VARCHAR(8),

    CONSTRAINT fk_id_personne
    FOREIGN KEY(id) REFERENCES personne(id)

) ENGINE=InnoDB;


CREATE TABLE matiere (
	nom_matiere VARCHAR(30),

    PRIMARY KEY(nom_matiere)

) ENGINE=InnoDB;


CREATE TABLE tutorat (
	matiere VARCHAR(10),
    date DATE,
    heure_debut INT(4),
    heure_fin INT(4),
    duree INT(4), -- HHMM
    tuteur VARCHAR(8),
    eleve VARCHAR(8),

    CONSTRAINT fk_date_calendrier
    FOREIGN KEY(date) REFERENCES calendrier(id),

    CONSTRAINT fk_heuredebut_calendrier
    FOREIGN KEY(heure_debut) REFERENCES calendrier(heure),

    CONSTRAINT fk_matiere_matiere
    FOREIGN KEY(matiere) REFERENCES matiere(nom_matiere),

    CONSTRAINT fk_tuteur_tuteur
    FOREIGN KEY(tuteur) REFERENCES tuteur(id),

    CONSTRAINT fk_eleve_etudiant
    FOREIGN KEY(eleve) REFERENCES etudiant(id)

) ENGINE=InnoDB;
