-- Active: 1667300056977@@localhost@3306@resto

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTAD;

DELIMITER $

CREATE PROCEDURE INSERTAD(IN DR INT, IN REF VARCHAR(47), IN NOM_COURT 
VARCHAR(35), IN NOM_LONG VARCHAR(180), IN ADRESSE 
VARCHAR(100), IN TELEPHONE VARCHAR(10), IN MAIL VARCHAR
(100), IN COMMENTAIRE TEXT, IN IMAGE VARCHAR(600)) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("AD-", Ref);
	
    IF IMAGE IS NULL THEN
	INSERT INTO
	    Site
	VALUES (
			DR,
	        null,
	        UPPER(v_ref),
	        NOM_COURT,
	        NOM_LONG,
	        ADRESSE,
	        TELEPHONE,
	        MAIL,
	        v_statut,
	        COMMENTAIRE,
            NULL,
            DEFAULT
	    );
	ELSE 
    INSERT INTO
	    Site
	VALUES (
			DR,
	        null,
	        UPPER(v_ref),
	        NOM_COURT,
	        NOM_LONG,
	        ADRESSE,
	        TELEPHONE,
	        MAIL,
	        v_statut,
	        COMMENTAIRE,
            null,
            IMAGE
	    );
	END IF;
END$ 

DELIMITER ;
SELECT * FROM pointaccesinternet;