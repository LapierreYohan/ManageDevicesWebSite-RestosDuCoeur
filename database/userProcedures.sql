-- Active: 1666192876096@@localhost@3306@rdc

SET default_storage_engine = InnoDB;

SET SQL_SAFE_UPDATES = 0;

DROP PROCEDURE IF EXISTS insertUser;

DROP PROCEDURE IF EXISTS deleteUser;

DELIMITER $

CREATE PROCEDURE INSERTUSER(IN REF VARCHAR(47), IN 
NOM VARCHAR(50), IN PRENOM VARCHAR(50), IN MOTDEPASSE 
VARCHAR(50), IN COM TEXT, IN ADMINUSER BOOLEAN, IN 
AUTHOR INT) BEGIN 
	DECLARE v_mail VARCHAR(100);
	DECLARE v_ref VARCHAR(50) DEFAULT CONCAT("US-", Ref);
	DECLARE v_nom VARCHAR(50) DEFAULT upper(Nom);
	DECLARE v_prenom VARCHAR(50) DEFAULT lower(Prenom);
	DECLARE i int DEFAULT 2;
	IF (
	    Select u.Reference_User
	    from Utilisateur u
	    where
	        u.Reference_User = v_ref
	) is not null Then
	select
	    "Reference_User déja utilisé";
	else IF (
	    Select u.Nom
	    from Utilisateur u
	    where
	        v_prenom = u.Prenom
	        and v_nom = u.Nom
	) is not null Then
	while (
	        Select u.Nom
	        from Utilisateur u
	        where
	            v_prenom = u.Prenom
	            and concat(v_nom, i) = u.Nom
	    ) is not null
	do
	set i := i + 1;
	end while;
	set v_nom = concat(v_nom, i);
	end if;
	SET
	    v_mail := CONCAT(
	        v_prenom,
	        ".",
	        LOWER(v_nom),
	        "@restosducoeur.org"
	    );
	SET v_ref := CONCAT("US-", Ref);
	IF Author IS NULL THEN
	INSERT INTO Utilisateur
	VALUES (
	        0,
	        v_ref,
	        v_nom,
	        v_prenom,
	        v_mail,
	        MotDePasse,
	        AdminUser,
	        Com,
	        NULL
	    );
	ELSE
	INSERT INTO Utilisateur
	VALUES (
	        0,
	        v_ref,
	        v_nom,
	        v_prenom,
	        v_mail,
	        MotDePasse,
	        AdminUser,
	        Com,
	        Author
	    );
	END IF;
	END IF;
END$ 

DELIMITER ;

/* --Tests insertUser
 CALL insertUser("200", "gailliard", "Axel", "1234", "Un gars assez n", true, NULL);
 CALL insertUser("200", "GAilliARD", "AXEl", "1234", "Un gars assez nu", true, NULL);
 CALL insertUser("215", "GAILLIARD", "AXEL", "1234", "Un gars assez nul", true, NULL);
 CALL insertUser("1203", "LAPIERRE", "Yohan", "4321", "Un gars trop bien", true, 1);
 SELECT  *
 FROM Utilisateur u
 WHERE 'Axel' = u.Prenom AND CONCAT('GAILLIARD', 2) = u.Nom;
 SELECT * 
 FROM Utilisateur;
 */

DELIMITER $

CREATE PROCEDURE DELETEUSER(IN REF VARCHAR(47)) BEGIN 
	Declare v_ref VARCHAR(50) DEFAULT CONCAT("US-", Ref);
	IF (
	    Select u.Reference_User
	    from Utilisateur u
	    where
	        u.Reference_User = concat("US-", Ref)
	) is not null Then
	Delete From Utilisateur
	where
	    Reference_User = concat("US-", Ref);
	else
	Select
	    "La reference entrée n'existe pas dans la table utilisateur";
	End if;
END$ 

DELIMITER ;

/* --Tests deleteUser
 call deleteUser(215);
 SELECT * 
 FROM Utilisateur;
 */

CREATE PROCEDURE EDITUSER(IN REF_IN VARCHAR(47), IN 
REF VARCHAR(47), IN NOM VARCHAR(50), IN PRENOM VARCHAR
(50), IN MOTDEPASSE VARCHAR(50), IN COM TEXT, IN ADMINUSER 
BOOLEAN, IN AUTHOR INT) BEGIN 
	UPDATE utilisateur u
	SET
	    u.Reference_User = REF,
	    u.Nom = NOM,
	    u.Prenom = PRENOM,
	    u.MotDePasse = MOTDEPASSE,
	    u.Commentaire = COM,
	    u.Admin_User = ADMINUSER,
	    u.ID_Author = AUTHOR
	WHERE
	    u.Reference_User = REF_IN;
END$ 

DELIMITER ;