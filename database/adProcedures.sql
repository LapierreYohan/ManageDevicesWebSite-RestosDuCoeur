-- Active: 1666943626683@@iutbg-lamp.univ-lyon1.fr@3306@p2103678

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTAD;

DELIMITER $

CREATE PROCEDURE INSERTAD(IN DR INT, IN REF VARCHAR(47), IN NOM_COURT 
VARCHAR(35), IN NOM_LONG VARCHAR(180), IN ADRESSE 
VARCHAR(100), IN TELEPHONE VARCHAR(10), IN MAIL VARCHAR
(100), IN COMMENTAIRE TEXT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("AD-", Ref);
	
	INSERT INTO
	    Site
	VALUES (
			DR,
	        0,
	        v_ref,
	        lower(NOM_COURT),
	        lower(NOM_LONG),
	        ADRESSE,
	        TELEPHONE,
	        MAIL,
	        v_statut,
	        COMMENTAIRE,
            null,
            null
	    );
END$ 

DELIMITER ;

CALL INSERTAD(1 ,"AD1", "DR8, AD01, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(1 ,"AD2", "DR8, AD02, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(1 ,"AD3", "DR8, AD03, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(2 ,"AD1", "DR8, AD01, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(2 ,"AD2", "DR8, AD02, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(3 ,"AD1", "DR8, AD01, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");
CALL INSERTAD(3 ,"AD2", "DR8, AD02, Lyon", "DR AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","");


SELECT * FROM Site;

SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference = 'DR-AIN');