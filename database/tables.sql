-- Active: 1666192876096@@localhost@3306

SET default_storage_engine=InnoDB;

SET SQL_SAFE_UPDATES=0;

DROP TABLE IF EXISTS Gerer;

DROP TABLE IF EXISTS Lier;

DROP TABLE IF EXISTS Administrer;

DROP TABLE IF EXISTS Autre;

DROP TABLE IF EXISTS Telephone;

DROP TABLE IF EXISTS Raccordement;

DROP TABLE IF EXISTS Serveur;

DROP TABLE IF EXISTS Relier;

DROP TABLE IF EXISTS Imprimer;

DROP TABLE IF EXISTS Interconnecter;

DROP TABLE IF EXISTS Imprimante;

DROP TABLE IF EXISTS Compte_Utilisateur;

DROP TABLE IF EXISTS Integrer;

DROP TABLE IF EXISTS Ordinateur;

DROP TABLE IF EXISTS Switch;

DROP TABLE IF EXISTS PointAccesInternet;

DROP TABLE IF EXISTS Abonnement;

DROP TABLE IF EXISTS Logiciel;

DROP TABLE IF EXISTS Site;

DROP TABLE IF EXISTS Delegation_Regionale;

DROP TABLE IF EXISTS Systeme;

DROP TABLE IF EXISTS TypeLogiciel;

DROP TABLE IF EXISTS TypeMateriel;

DROP TABLE IF EXISTS Utilisateur;

DROP TABLE IF EXISTS Statut;

DROP TABLE IF EXISTS Connexion;

DROP TABLE IF EXISTS Reseau;

DROP TABLE IF EXISTS Particularite;

CREATE TABLE
    Utilisateur (
        ID_User INT AUTO_INCREMENT NOT NULL UNIQUE,
        Reference_User VARCHAR(50) NOT NULL UNIQUE,
        Nom VARCHAR(50) NOT NULL,
        Prenom VARCHAR(50) NOT NULL,
        Mail VARCHAR(100) NOT NULL UNIQUE,
        MotDePasse TEXT NOT NULL,
        Admin_User BOOLEAN DEFAULT FALSE NOT NULL,
        Commentaire TEXT,
        ID_Author INT DEFAULT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/utilisateur.png", 
        CONSTRAINT `pk_Utilisateur` PRIMARY KEY (ID_User),
        CONSTRAINT `fk_User` FOREIGN KEY (ID_Author) REFERENCES Utilisateur(ID_User) ON DELETE
        SET NULL ON UPDATE
        SET NULL
    );

CREATE TABLE
    Delegation_Regionale (
        ID_Dr INT AUTO_INCREMENT NOT NULL UNIQUE,
        Reference VARCHAR(50) NOT NULL UNIQUE,
        Nom_Court VARCHAR(35) NOT NULL UNIQUE,
        Nom_Long VARCHAR(180),
        Adresse VARCHAR(100) NOT NULL,
        Telephone VARCHAR(10),
        Mail VARCHAR(100),
        Statut BOOLEAN DEFAULT FALSE NOT NULL,
        Commentaire TEXT,
        Image VARCHAR(600) DEFAULT "/img/icon/Département.png", 
        CONSTRAINT `pk_dr` PRIMARY KEY (ID_Dr)
    );

CREATE TABLE
    Site (
        ID_Dr INT NOT NULL,
        ID_Site INT AUTO_INCREMENT NOT NULL UNIQUE,
        Reference VARCHAR(50) NOT NULL,
        Nom_Court VARCHAR(35) NOT NULL,
        Nom_Long VARCHAR(180),
        Adresse VARCHAR(100) NOT NULL,
        Telephone VARCHAR(10),
        Mail VARCHAR(100),
        Statut BOOLEAN DEFAULT FALSE NOT NULL,
        Commentaire TEXT,
        ID_SiteParent INT DEFAULT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Association départementale.png", 
        CONSTRAINT `pk_site` PRIMARY KEY (ID_Dr, ID_Site),
        CONSTRAINT `fk_site_dr` FOREIGN KEY (ID_Dr) REFERENCES Delegation_Regionale(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_site_siteSite` FOREIGN KEY (ID_SiteParent) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Administrer (
        ID_User INT NOT NULL,
        ID_Dr INT NOT NULL,
        CONSTRAINT `pk_administrer` PRIMARY KEY (ID_User, ID_Dr),
        CONSTRAINT `fk_administrer_utilisateur` FOREIGN KEY (ID_User) REFERENCES Utilisateur(ID_User) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_administrer_delegation` FOREIGN KEY (ID_Dr) REFERENCES Delegation_Regionale(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Gerer (
        ID_User INT NOT NULL,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        CONSTRAINT `pk_gerer` PRIMARY KEY (ID_User, ID_Dr, ID_Site),
        CONSTRAINT `fk_gerer_utilisateur` FOREIGN KEY (ID_User) REFERENCES Utilisateur(ID_User) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_gerer_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_gerer_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Systeme (
        ID_Systeme INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(70) NOT NULL UNIQUE,
        Type_Systeme VARCHAR(50),
        Licence TEXT,
        Commentaire TEXT,
        CONSTRAINT `pk_systeme` PRIMARY KEY (ID_Systeme)
    );

CREATE TABLE
    TypeLogiciel(
        ID_Type INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL UNIQUE,
        CONSTRAINT `pk_typelogiciel` PRIMARY KEY (ID_Type)
    );

CREATE TABLE
    TypeMateriel(
        ID_TypeMateriel INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL,
        Device VARCHAR(255) DEFAULT NULL,
        CONSTRAINT `pk_typemateriel` PRIMARY KEY (ID_TypeMateriel)
    );

CREATE TABLE
    Logiciel(
        ID_Logiciel INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL UNIQUE,
        Licence TEXT,
        Version VARCHAR(50),
        Commentaire TEXT,
        ID_Type INT NOT NULL,
        CONSTRAINT `pk_logiciel` PRIMARY KEY (ID_Logiciel),
        CONSTRAINT `fk_logiciel_typelogiciel` FOREIGN KEY (ID_Type) REFERENCES TypeLogiciel(ID_Type) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Statut (
        ID_Statut INT AUTO_INCREMENT NOT NULL UNIQUE,
        Action_Statut VARCHAR(100) NOT NULL,
        Statut_Materiel VARCHAR(100) NOT NULL,
        Etat VARCHAR(100) NOT NULL,
        Commentaire TEXT,
        CONSTRAINT `pk_statut` PRIMARY KEY (ID_Statut)
    );

CREATE TABLE
    Reseau(
        ID_Reseau INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL UNIQUE,
        CONSTRAINT `pk_reseau` PRIMARY KEY (ID_Reseau)
    );

CREATE TABLE
    Connexion(
        ID_Connexion INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL UNIQUE,
        CONSTRAINT `pk_connexion` PRIMARY KEY (ID_Connexion)
    );

CREATE TABLE
    Particularite(
        ID_Fonction INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(100) NOT NULL UNIQUE,
        CONSTRAINT `pk_particularite` PRIMARY KEY (ID_Fonction)
    );

CREATE TABLE
    Abonnement(
        ID_Abonnement INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Abonnement",
        Reference_Abonnement VARCHAR(50) NOT NULL,
        Operateur VARCHAR(50) NOT NULL,
        Numero_Principal VARCHAR(10),
        Numero_Secondaire VARCHAR(10),
        Numero_Client VARCHAR(50),
        Titulaire VARCHAR(50),
        ID_Service_Client VARCHAR(50),
        MDP_Service_Client VARCHAR(50),
        Commentaire TEXT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        ID_Reseau INT NOT NULL,
        ID_Connexion INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Subscribe.png", 
        CONSTRAINT `pk_abonnement` PRIMARY KEY(ID_Abonnement),
        CONSTRAINT `fk_abonnement_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_abonnement_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_abonnement_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_abonnement_reseau` FOREIGN KEY(ID_Reseau) REFERENCES Reseau(ID_Reseau) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_abonnement_connexion` FOREIGN KEY(ID_Connexion) REFERENCES Connexion(ID_Connexion) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    PointAccesInternet(
        ID_Acces INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Point D'accès Internet",
        Reference_Acces VARCHAR(50) NOT NULL,
        Operateur VARCHAR(50) NOT NULL,
        Nom VARCHAR(50) NOT NULL,
        Serie VARCHAR(50),
        Commentaire TEXT,
        ID_Abonnement INT NOT NULL,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        ID_Connexion INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Router.png", 
        CONSTRAINT `pk_pointAccesInternet` PRIMARY KEY(ID_Acces),
        CONSTRAINT `fk_pointAccesInternet_abonnement` FOREIGN KEY(ID_Abonnement) REFERENCES Abonnement(ID_Abonnement) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_pointAccesInternet_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_pointAccesInternet_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_pointAccesInternet_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_pointAccesInternet_connexion` FOREIGN KEY(ID_Connexion) REFERENCES Connexion(ID_Connexion) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Switch(
        ID_Switch INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Switch",
        Reference_Switch VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        Nb_Port INT NOT NULL,
        Serie VARCHAR(50),
        Commentaire TEXT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Acces INT,
        ID_Statut INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Switch.png", 
        CONSTRAINT `pk_switch` PRIMARY KEY(ID_Switch),
        CONSTRAINT `fk_switch_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_switch_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_switch_pointAccesInternet` FOREIGN KEY(ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_switch_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Ordinateur(
        ID_Ordinateur INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Ordinateur",
        Reference_Ordinateur VARCHAR(50) NOT NULL,
        Serie VARCHAR(50),
        Usages TEXT,
        Compatible_W11 BOOLEAN NOT NULL DEFAULT FALSE,
        Reseau VARCHAR(50),
        RAM VARCHAR(50),
        RAM_Type VARCHAR(50),
        Disque VARCHAR(50),
        Disque_Partition VARCHAR(50),
        Marque VARCHAR(50),
        Commentaire TEXT,
        ID_TypeMateriel INT NOT NULL,
        ID_Statut INT NOT NULL,
        ID_Systeme INT NOT NULL,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Acces INT,
        ID_Switch INT,
        Image VARCHAR(600) DEFAULT "/img/icon/Desktop.png", 
        CONSTRAINT `pk_ordinateur` PRIMARY KEY (ID_Ordinateur),
        CONSTRAINT `fk_ordinateur_typemateriel` FOREIGN KEY (ID_TypeMateriel) REFERENCES TypeMateriel(ID_TypeMateriel) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_statut` FOREIGN KEY (ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_systeme` FOREIGN KEY (ID_Systeme) REFERENCES Systeme(ID_Systeme) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_pointAccesInternet` FOREIGN KEY (ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_ordinateur_switch` FOREIGN KEY (ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Imprimante(
        ID_Imprimante INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Imprimante",
        Reference_Imprimante VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        Serie VARCHAR(50),
        Commentaire TEXT,
        ID_Switch INT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Printer.png", 
        CONSTRAINT `pk_imprimante` PRIMARY KEY(ID_Imprimante),
        CONSTRAINT `fk_imprimante_switch` FOREIGN KEY(ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_imprimante_siteSite` FOREIGN KEY(ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_imprimante_siteDr` FOREIGN KEY(ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `pk_imprimante_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Integrer(
        ID_Ordinateur INT NOT NULL,
        ID_Logiciel INT NOT NULL,
        CONSTRAINT `pk_integrer` PRIMARY KEY(ID_Ordinateur, ID_Logiciel),
        CONSTRAINT `fk_integrer_ordinateur` FOREIGN KEY(ID_Ordinateur) REFERENCES Ordinateur(ID_Ordinateur) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_integrer_logiciel` FOREIGN KEY(ID_Logiciel) REFERENCES Logiciel(ID_Logiciel) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Interconnecter(
        ID_Imprimante INT NOT NULL,
        ID_Ordinateur INT NOT NULL,
        Raccordement VARCHAR(100),
        CONSTRAINT `pk_interconnecter` PRIMARY KEY(ID_Imprimante, ID_Ordinateur),
        CONSTRAINT `fk_interconnecter_imprimante` FOREIGN KEY (ID_Imprimante) REFERENCES Imprimante(ID_Imprimante) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_interconnecter_ordinateur` FOREIGN KEY (ID_Ordinateur) REFERENCES Ordinateur(ID_Ordinateur) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Compte_Utilisateur(
        ID_Compte INT AUTO_INCREMENT NOT NULL UNIQUE,
        Nom VARCHAR(50) NOT NULL UNIQUE,
        MotDePasse VARCHAR(50) NOT NULL,
        SynchroPartage TEXT,
        AdminCompte BOOLEAN NOT NULL DEFAULT FALSE,
        Commentaire TEXT,
        CONSTRAINT `pk_compteUtilisateur` PRIMARY KEY(ID_Compte)
);

CREATE TABLE
    Lier (
        ID_Compte INT NOT NULL,
        ID_Ordinateur INT NOT NULL,
        CONSTRAINT `pk_lier` PRIMARY KEY (ID_Compte, ID_Ordinateur),
        CONSTRAINT `fk_lier_ordinateur` FOREIGN KEY (ID_Ordinateur) REFERENCES Ordinateur(ID_Ordinateur) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_lier_compteUtilisateur` FOREIGN KEY (ID_Compte) REFERENCES Compte_Utilisateur(ID_Compte) ON DELETE RESTRICT ON UPDATE RESTRICT
	);

CREATE TABLE
    Imprimer(
        ID_Imprimante INT NOT NULL,
        ID_Fonction INT NOT NULL,
        CONSTRAINT `pk_imprimer` PRIMARY KEY(ID_Imprimante, ID_Fonction),
        CONSTRAINT `fk_imprimer_imprimante` FOREIGN KEY(ID_Imprimante) REFERENCES Imprimante(ID_Imprimante) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_imprimer_particularite` FOREIGN KEY(ID_Fonction) REFERENCES Particularite(ID_Fonction) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Serveur(
        ID_Serveur INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Serveur",
        Reference_Serveur VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        Capacite VARCHAR(50),
        Serie VARCHAR(50),
        Commentaire TEXT,
        ID_Acces INT,
        ID_Switch INT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Server.png", 
        CONSTRAINT `pk_serveur` PRIMARY KEY(ID_Serveur),
        CONSTRAINT `fk_serveur_pointAccesInternet` FOREIGN KEY(ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_serveur_switch` FOREIGN KEY(ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_serveur_siteSite` FOREIGN KEY(ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_serveur_siteDr` FOREIGN KEY(ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_serveur_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Relier(
        ID_Switch INT NOT NULL,
        ID_Switch_1 INT NOT NULL,
        CONSTRAINT `pk_relier` PRIMARY KEY(ID_Switch, ID_Switch_1),
        CONSTRAINT `fk_relier_switch` FOREIGN KEY(ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_relier_switch1` FOREIGN KEY(ID_Switch_1) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Raccordement(
        ID_Raccordement INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Raccordement",
        Reference_Raccordement VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        Serie VARCHAR(50),
        Commentaire TEXT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        ID_Systeme INT NOT NULL,
        ID_Acces INT,
        ID_Serveur INT,
        ID_Switch INT,
        ID_Imprimante INT,
        ID_Ordinateur INT,
        Image VARCHAR(600) DEFAULT "/img/icon/CPL.png", 
        CONSTRAINT `pk_raccordement` PRIMARY KEY(ID_Raccordement),
        CONSTRAINT `fk_raccordement_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_pointAccesInternet` FOREIGN KEY(ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_serveur` FOREIGN KEY(ID_Serveur) REFERENCES Serveur(ID_Serveur) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_switch` FOREIGN KEY(ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_imprimante` FOREIGN KEY(ID_Imprimante) REFERENCES Imprimante(ID_Imprimante) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_raccordement_ordinateur` FOREIGN KEY(ID_Ordinateur) REFERENCES Ordinateur(ID_Ordinateur) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Telephone(
        ID_Telephone INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Telephone",
        Reference_Telephone VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        RAM VARCHAR(50),
        Disque VARCHAR(50),
        Commentaire TEXT,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        ID_Statut INT NOT NULL,
        ID_TypeMateriel INT NOT NULL,
        ID_Abonnement INT,
        ID_Acces INT,
        Image VARCHAR(600) DEFAULT "/img/icon/Smartphone.png", 
        CONSTRAINT `pk_telephone` PRIMARY KEY(ID_Telephone),
        CONSTRAINT `fk_telephone_siteSite` FOREIGN KEY(ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_telephone_siteDr` FOREIGN KEY(ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_telephone_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_telephone_typeMateriel` FOREIGN KEY(ID_TypeMateriel) REFERENCES TypeMateriel(ID_TypeMateriel) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_telephone_abonnement` FOREIGN KEY(ID_Abonnement) REFERENCES Abonnement(ID_Abonnement) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_telephone_pointAccesInternet` FOREIGN KEY(ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
		CONSTRAINT `fk_telephone_systeme` FOREIGN KEY (ID_Systeme) REFERENCES Systeme(ID_Systeme) ON DELETE RESTRICT ON UPDATE RESTRICT
    );

CREATE TABLE
    Autre(
        ID_Autre INT AUTO_INCREMENT NOT NULL UNIQUE,
        DateInsert DATETIME NOT NULL DEFAULT NOW(),
        Historique BOOLEAN NOT NULL DEFAULT FALSE,
        Materiel VARCHAR(50) NOT NULL DEFAULT "Autre",
        Reference_Autre VARCHAR(50) NOT NULL,
        Marque VARCHAR(50),
        Modele VARCHAR(50),
        Serie VARCHAR(50),
        Specification TEXT,
        Commentaire TEXT,
        ID_Switch INT,
        ID_Acces INT,
        ID_Statut INT NOT NULL,
        ID_Dr INT NOT NULL,
        ID_Site INT NOT NULL,
        Image VARCHAR(600) DEFAULT "/img/icon/Other.png", 
        CONSTRAINT `pk_autre` PRIMARY KEY(ID_Autre),
        CONSTRAINT `fk_autre_switch` FOREIGN KEY(ID_Switch) REFERENCES Switch(ID_Switch) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_autre_pointAccesInternet` FOREIGN KEY(ID_Acces) REFERENCES PointAccesInternet(ID_Acces) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_autre_statut` FOREIGN KEY(ID_Statut) REFERENCES Statut(ID_Statut) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_autre_siteDr` FOREIGN KEY (ID_Dr) REFERENCES Site(ID_Dr) ON DELETE RESTRICT ON UPDATE RESTRICT,
        CONSTRAINT `fk_autre_siteSite` FOREIGN KEY (ID_Site) REFERENCES Site(ID_Site) ON DELETE RESTRICT ON UPDATE RESTRICT
    );