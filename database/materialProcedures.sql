-- Active: 1666192876096@@localhost@3306@rdc

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS INSERTORDINATEUR;

DELIMITER $

CREATE PROCEDURE INSERTORDINATEUR(IN REF INT, IN SERIE 
VARCHAR(50), IN USAGES TEXT, IN COMPATIBLE_W11 BOOLEAN
, IN RESEAU VARCHAR(50), IN RAM VARCHAR(50), IN RAM_TYPE 
VARCHAR(50), IN DISQUE VARCHAR(50), IN DISQUE_PARTITION 
VARCHAR(50), IN MARQUE VARCHAR(50), IN COMMENTAIRE 
TEXT, IN ID_TYPEMATERIEL INT, IN ID_SYSTEME INT, IN 
ID_DR INT, IN ID_SITE INT, IN ID_ACCES INT, IN ID_SWITCH 
INT, IN IMAGE VARCHAR(600)) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("OR-", REF);
	IF (
	    SELECT
	        o.REFERENCE_ORDINATEUR
	    FROM Ordinateur o
	    WHERE
	        o.REFERENCE_ORDINATEUR = v_ref
	        AND Historique = false
	) IS NOT NULL THEN
	SELECT
	    "REFERENCE_ORDINATEUR déja utilisé";
	ELSEIF (
	    IMAGE = ''
	    or IMAGE = NULL
	) then
	INSERT INTO Ordinateur
	VALUES (
	        null,
	        now(),
	        default,
	        default,
	        UPPER(v_ref),
	        SERIE,
	        USAGES,
	        COMPATIBLE_W11,
	        RESEAU,
	        RAM,
	        RAM_TYPE,
	        DISQUE,
	        DISQUE_PARTITION,
	        MARQUE,
	        COMMENTAIRE,
	        v_statut,
	        ID_SYSTEME,
	        ID_DR,
	        ID_SITE,
	        ID_Acces,
	        ID_Switch,
	        DEFAULT
	    );
	ELSE
	INSERT INTO Ordinateur
	VALUES (
	        null,
	        now(),
	        default,
	        default,
	        UPPER(v_ref),
	        SERIE,
	        USAGES,
	        COMPATIBLE_W11,
	        RESEAU,
	        RAM,
	        RAM_TYPE,
	        DISQUE,
	        DISQUE_PARTITION,
	        MARQUE,
	        COMMENTAIRE,
	        ID_TYPEMATERIEL,
	        v_statut,
	        ID_SYSTEME,
	        ID_DR,
	        ID_SITE,
	        ID_Acces,
	        ID_Switch,
	        Image
	    );
	END IF;
END$ 

DELIMITER ;

/*-------------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTSWITCH;

DELIMITER $

CREATE PROCEDURE INSERTSWITCH(IN REF INT, IN MARQUE 
VARCHAR(50), IN MODELE VARCHAR(50), IN NB_PORT INT
, IN SERIE VARCHAR(50), IN COMMENTAIRE TEXT, IN ID_DR 
INT, IN ID_SITE INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("SW-", REF);
	IF (
	    SELECT
	        s.REFERENCE_SWITCH
	    FROM Switch s
	    WHERE
	        s.REFERENCE_SWITCH = v_ref
	) IS NOT NULL THEN
	SELECT
	    "REFERENCE_SWITCH déja utilisé";
	ELSE
	INSERT INTO Switch
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        MARQUE,
	        MODELE,
	        NB_PORT,
	        SERIE,
	        COMMENTAIRE,
	        ID_DR,
	        ID_SITE,
	        DEFAULT,
	        v_statut,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTIMPRIMANTE;

DELIMITER $

CREATE PROCEDURE INSERTIMPRIMANTE(IN REF INT, IN MARQUE 
VARCHAR(50), IN MODELE VARCHAR(50), IN SERIE VARCHAR
(50), IN COMMENTAIRE TEXT, IN ID_DR INT, IN ID_SITE 
INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("IM-", REF);
	IF (
	    SELECT
	        i.Reference_Imprimante
	    FROM Imprimante i
	    WHERE
	        i.Reference_Imprimante = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Imprimante déja utilisé";
	ELSE
	INSERT INTO Imprimante
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        MARQUE,
	        MODELE,
	        SERIE,
	        COMMENTAIRE,
	        NULL,
	        ID_DR,
	        ID_SITE,
	        v_statut,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTSERVEUR;

DELIMITER $

CREATE PROCEDURE INSERTSERVEUR(REF INT, MARQUE VARCHAR
(50), MODELE VARCHAR(50), CAPACITE VARCHAR(50), SERIE 
VARCHAR(50), COMMENTAIRE TEXT, ID_DR INT, ID_SITE 
INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("SE-", REF);
	IF (
	    SELECT
	        s.Reference_Serveur
	    FROM Serveur s
	    WHERE
	        s.Reference_Serveur = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Serveur déja utilisé";
	ELSE
	INSERT INTO Serveur
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        MARQUE,
	        MODELE,
	        Capacite,
	        SERIE,
	        COMMENTAIRE,
	        NULL,
	        NULL,
	        ID_DR,
	        ID_SITE,
	        v_statut,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTABONNEMENT;

DELIMITER $

CREATE PROCEDURE INSERTABONNEMENT(IN REF INT, IN OPERATEUR 
VARCHAR(50), IN NUMERO_PRINCIPAL VARCHAR(10), IN NUMERO_SECONDAIRE 
VARCHAR(10), IN NUMERO_CLIENT VARCHAR(50), IN TITULAIRE 
VARCHAR(50), IN ID_SERVICE_CLIENT VARCHAR(50), IN 
MDP_SERVICE_CLIENT VARCHAR(50), IN COMMENTAIRE TEXT
, IN ID_DR INT, IN ID_SITE INT, IN ID_RESEAU INT, 
IN ID_CONNEXION INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("AB-", REF);
	IF (
	    SELECT
	        a.Reference_Abonnement
	    FROM Abonnement a
	    WHERE
	        a.Reference_Abonnement = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Abonnement déja utilisé";
	ELSE
	INSERT INTO Abonnement
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        OPERATEUR,
	        Numero_Principal,
	        Numero_Secondaire,
	        Numero_Client,
	        Titulaire,
	        ID_Service_Client,
	        MDP_Service_Client,
	        COMMENTAIRE,
	        ID_DR,
	        ID_SITE,
	        v_statut,
	        ID_Reseau,
	        ID_CONNEXION,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTPOINTACCESINTERNET;

DELIMITER $

CREATE PROCEDURE INSERTPOINTACCESINTERNET(IN REF INT
, IN OPERATEUR VARCHAR(50), IN NOM VARCHAR(50), IN 
SERIE VARCHAR(50), IN COMMENTAIRE TEXT, IN ID_ABONNEMENT 
INT, IN ID_CONNEXION INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("PA-", REF);
	IF (
	    SELECT p.Reference_Acces
	    FROM PointAccesInternet p
	    WHERE
	        p.Reference_Acces = v_ref
	) IS NOT NULL THEN
	SELECT
	    "PointAccesInternet déja utilisé";
	ELSE
	INSERT INTO
	    PointAccesInternet
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        OPERATEUR,
	        NOM,
	        SERIE,
	        COMMENTAIRE,
	        ID_ABONNEMENT,
	        NULL,
	        NULL,
	        v_statut,
	        ID_CONNEXION,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTAUTRE;

DELIMITER $

CREATE PROCEDURE INSERTAUTRE(IN REF INT, IN MARQUE 
VARCHAR(50), IN MODELE VARCHAR(50), IN SERIE VARCHAR
(50), IN SPECIFICATION TEXT, IN COMMENTAIRE TEXT, 
IN ID_DR INT, IN ID_SITE INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("AU-", REF);
	IF (
	    SELECT a.Reference_Autre
	    FROM Autre a
	    WHERE
	        a.Reference_Autre = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Autre déja utilisé";
	ELSE
	INSERT INTO Autre
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        Marque,
	        Modele,
	        Serie,
	        Specification,
	        COMMENTAIRE,
	        NULL,
	        NULL,
	        v_statut,
	        ID_DR,
	        ID_SITE,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

SELECT * FROM Autre;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTTELEPHONE;

DELIMITER $

CREATE PROCEDURE INSERTTELEPHONE(IN REF INT, IN MARQUE 
VARCHAR(50), IN MODELE VARCHAR(50), IN RAM VARCHAR
(50), IN DISQUE VARCHAR(50), IN COMMENTAIRE TEXT, 
IN ID_DR INT, IN ID_SITE INT, IN ID_TYPEMATERIEL INT
) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("TE-", REF);
	IF (
	    SELECT
	        t.Reference_Telephone
	    FROM Telephone t
	    WHERE
	        t.Reference_Telephone = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Telephone déja utilisé";
	ELSE
	INSERT INTO Telephone
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        Marque,
	        Modele,
	        RAM,
	        Disque,
	        COMMENTAIRE,
	        ID_DR,
	        ID_SITE,
	        v_statut,
	        ID_TYPEMATERIEL,
	        null,
	        null,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;

/*------------------------------------------*/

DROP PROCEDURE IF EXISTS INSERTRACCORDEMENT;

DELIMITER $

CREATE PROCEDURE INSERTRACCORDEMENT(IN REF INT, IN 
MARQUE VARCHAR(50), IN MODELE VARCHAR(50), IN SERIE 
VARCHAR(50), IN COMMENTAIRE TEXT, IN ID_DR INT, IN 
ID_SITE INT, IN ID_STATUT INT) BEGIN 
	DECLARE v_statut BOOLEAN DEFAULT true;
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("RA-", REF);
	IF (
	    SELECT
	        r.Reference_Raccordement
	    FROM Raccordement r
	    WHERE
	        r.Reference_Raccordement = v_ref
	) IS NOT NULL THEN
	SELECT
	    "Reference_Telephone déja utilisé";
	ELSE
	INSERT INTO Raccordement
	VALUES (
	        null,
	        now(),
	        DEFAULT,
	        DEFAULT,
	        UPPER(v_ref),
	        Marque,
	        Modele,
	        Serie,
	        Commentaire,
	        ID_Dr,
	        ID_Site,
	        ID_Statut,
	        NULL,
	        NULL,
	        NULL,
	        null,
	        null,
	        DEFAULT
	    );
	END IF;
END$ 

DELIMITER ;