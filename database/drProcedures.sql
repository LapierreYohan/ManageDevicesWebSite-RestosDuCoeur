-- Active: 1666943626683@@iutbg-lamp.univ-lyon1.fr@3306@p2103678

SET default_storage_engine = InnoDB;
SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTDR;

DELIMITER $

CREATE PROCEDURE INSERTDR(
IN Ref VARCHAR(47), 
IN NOM_COURT VARCHAR(35),
IN NOM_LONG VARCHAR(180), 
IN ADRESSE VARCHAR(100), 
IN TELEPHONE VARCHAR(10), 
IN MAIL VARCHAR(100), 
IN COMMENTAIRE TEXT) 

BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("DR-", Ref);
    
    IF (SELECT u.Reference FROM Delegation_Regionale u WHERE u.Reference = v_ref) IS NOT NULL THEN
		SELECT "Reference_User déja utilisé";
	ELSE 
		INSERT INTO Delegation_Regionale VALUES (0, v_ref, lower(NOM_COURT),lower(NOM_LONG),ADRESSE,TELEPHONE, MAIL, v_statut ,COMMENTAIRE);
    END IF;
END$ 

DELIMITER ;

CALL INSERTDR("AIN", "DR8, AD01, Bourg en Bresse", "DR AURA, AD AIN, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("RHONE", "DR8, AD02, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("AUVERGNE", "DR8, AD03, Bourg en Bresse", "DR AURA, AD AUVERGNE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("NORMANDIE", "DR8, AD04, Bourg en Bresse", "DR AURA, AD NORMANDIE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("BRETAGNE", "DR8, AD05, Bourg en Bresse", "DR AURA, AD BRETAGNE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("ARDECHE", "DR8, AD06, Bourg en Bresse", "DR AURA, AD ARDECHE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("JURA", "DR8, AD07, Bourg en Bresse", "DR AURA, AD JURA, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("ISERE", "DR8, AD08, Bourg en Bresse", "DR AURA, AD ISERE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("LOIRE", "DR8, AD09, Bourg en Bresse", "DR AURA, AD LOIRE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("SAONE", "DR8, AD010, Bourg en Bresse", "DR AURA, AD SAONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");
CALL INSERTDR("TOULOUSE", "DR8, AD011, Bourg en Bresse", "DR AURA, AD TOULOUSE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr", "");

SELECT * FROM Delegation_Regionale;
