DROP PROCEDURE IF EXISTS remplirEmploiDuTemps;

-- to do : correpsondance entre la date où on rempli et le jour (lundi, mardi..)

DELIMITER //
CREATE PROCEDURE remplirEmploiDuTemps(IN dateDebut DATE,IN dateFin DATE)
BEGIN
    DECLARE dateActuelle DATE;
    SET dateActuelle = dateDebut;
    WHILE dateActuelle < dateFin DO
      IF DAYOFWEEK(dateActuelle) == 1 or 7 THEN
        SET dateActuelle = ADDDATE(dateActuelle, INTERVAL 1 DAY);
      ELSE
        INSERT INTO emploiDuTemps VALUES(
            dateActuelle,
            YEAR(dateActuelle),
            MONTH(dateActuelle),
            WEEKOFYEAR(dateActuelle),
            DAY(dateActuelle),
            null,

            null,
            null,
            null,
            null,
            null,

		    SET dateActuelle = ADDDATE(dateActuelle, INTERVAL 1 DAY);
    END IF;
	END WHILE;
END
//
DELIMITER ;

TRUNCATE TABLE emploiDuTemps;  -- Vide les données de la table sans supprimer cette derniere
CALL remplirEmploiDuTemps(CURDATE(),'2017-01-01');
OPTIMIZE TABLE remplirEmploiDuTemps;  -- optimise le stockage en fonction du moteur de stockage

/*
INSERT INTO emploiDuTemps(heure, mardi)
VALUES
(1, java)
;
*/
