-- Active: 1666192876096@@localhost@3306@rdc

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTDR;

DELIMITER $

CREATE PROCEDURE INSERTDR(IN REF VARCHAR(47), IN NOM_COURT 
VARCHAR(35), IN NOM_LONG VARCHAR(180), IN ADRESSE 
VARCHAR(100), IN TELEPHONE VARCHAR(10), IN MAIL VARCHAR
(100), IN COMMENTAIRE TEXT, IN IMAGE VARCHAR(600)) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("DR-", Ref);
	IF (
	    SELECT u.Reference
	    FROM Delegation_Regionale u
	    WHERE
	        u.Reference = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_DR déja utilisé";
	ELSE
		IF IMAGE IS NULL THEN
		INSERT INTO
			Delegation_Regionale
		VALUES (
				null,
				UPPER(v_ref),
				NOM_COURT,
				NOM_LONG,
				ADRESSE,
				TELEPHONE,
				MAIL,
				v_statut,
				COMMENTAIRE,
				DEFAULT
			);
		ELSE 
        INSERT INTO
			Delegation_Regionale
		VALUES (
				null,
				UPPER(v_ref),
				NOM_COURT,
				NOM_LONG,
				ADRESSE,
				TELEPHONE,
				MAIL,
				v_statut,
				COMMENTAIRE,
				IMAGE
			);
            END IF;
        
	END IF;
END$ 

DELIMITER ;

