-- Active: 1667300056977@@localhost@3306@resto

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTUO;

DELIMITER $

CREATE PROCEDURE INSERTUO(IN DR INT, IN REF VARCHAR(47), IN NOM_COURT 
VARCHAR(35), IN NOM_LONG VARCHAR(180), IN ADRESSE 
VARCHAR(100), IN TELEPHONE VARCHAR(10), IN MAIL VARCHAR
(100), IN COMMENTAIRE TEXT, IN ID_SiteParent INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("UO-", Ref);
	
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
            ID_SiteParent
	    );
END$ 

DELIMITER ;

CALL INSERTUO(1 ,"UO1", "UO, UO01, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 1);
CALL INSERTUO(1 ,"UO2", "UO, UO02, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 1);
CALL INSERTUO(1 ,"UO3", "UO, UO03, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 1);
CALL INSERTUO(1 ,"UO4", "UO, UO04, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 2);
CALL INSERTUO(1 ,"UO5", "UO, UO05, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 3);
CALL INSERTUO(1 ,"UO6", "UO, UO06, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 3);
CALL INSERTUO(1 ,"UO7", "UO, UO06, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 3);

SELECT * FROM Site;

SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference = 'DR-AIN');