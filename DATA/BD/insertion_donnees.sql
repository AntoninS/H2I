DROP PROCEDURE IF EXISTS remplir_calendrier;

DELIMITER //
CREATE PROCEDURE remplir_calendrier(IN date_debut DATE,IN date_fin DATE)
BEGIN
    DECLARE date_actuelle DATE;
    SET date_actuelle = date_debut;
    WHILE date_actuelle < date_fin DO
        INSERT INTO calendrier VALUES(
            YEAR(date_actuelle)*10000 + MONTH(date_actuelle)*100 + DAY(date_actuelle),
            date_actuelle,
            YEAR(date_actuelle),
            MONTH(date_actuelle),
            DAY(date_actuelle),
            WEEKOFYEAR(date_actuelle),
            DATE_FORMAT(currentdate,'%W'),  -- Complete le nom du jour
            DATE_FORMAT(currentdate,'%M'),	-- Complete le nom du mois
            'o',
            CASE DAYOFWEEK(currentdate) WHEN 0 THEN 'o' WHEN 6 then 'o' ELSE 'n' END -- 0 = dimanche, 6 = samedi
			);
		SET date_actuelle = ADDDATE(date_actuelle, INTERVAL 1 DAY);
	END WHILE;
END
//
DELIMITER ;

TRUNCATE TABLE time_dimension;  -- Vide les données de la table sans supprimer cette derniere
CALL remplir_calendrier('1-01-01','2015-01-01');
OPTIMIZE TABLE remplir_calendrier;  -- optimise le stockage en fonction du moteur de stockage
