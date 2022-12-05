-- Active: 1666192876096@@localhost@3306@rdc
/*------------------------------------------*/
/*Insertion de Délégation régionale         */
/*------------------------------------------*/

CALL INSERTDR("Auvergne-Rhône-Alpes","DR84, AD38, Agnin","DR Auvergne-Rhône-Alpes, AD Isere, Agnin","20 Chemin Saint Vincent, Agnin - 38003","0798589632","tristique.neque.venenatis@infelisNulla.co.uk","Délégation régionale d'Auvergne Rhône Alpes");
CALL INSERTDR("Normandie","DR28, AD14, Ablon","DR Normandie, AD Calvados, Ablon","159 Chemin bailleul, Ablon - 14001","0654785245","Duis@vitaediam.co.uk","Délégation régionale de Normandie");
CALL INSERTDR("Corse","DR94, AD2B, Aghione","DR Corse, AD Haute-Corse, Aghione","753 Samuletto, Aghione - 2B002","0732032415","rhoncus.Proin@portaelit.edu","Délégation régionale de Corse");
CALL INSERTDR("Bretagne","DR53, AD56, Ambon","DR Bretagne, AD Morbihan, Ambon","13 Allee de Port Lestre, Ambon - 56002","0789882565","ornare.elit.elit@neque.com","Délégation régionale de Bretagne");
CALL INSERTDR("Occitanie","DR76, AD11, Carcassonne","DR Occitanie, AD Aude, Carcassonne","115 Allee Jean Lambert, Carcassonne - 11069","0656369841","odio@rutrumFusce.com","Délégation régionale d'Occitanie");
CALL INSERTDR("Centre-Val de Loire","DR24, AD28, Denonville","DR Centre-Val de Loire, AD Eure-et-Loir, Denonville","2 Rue des Sapins, Denonville - 28129","0621487836","vestibulum.nec@idante.edu","Délégation régionale de Centre-Val de Loire");
CALL INSERTDR("Île-de-France","DR11, AD75, Paris","DR Île-De-France, AD Paris, Paris","75 Rue des Haies, Paris 20e Arrondissement - 75120","0666214875","nulla.at@mus.ca","Délégation régionale d'Île-De-France");
CALL INSERTDR("Hauts-de-France","DR32, AD60, Rhuis","DR Hauts-de-France, AD Oise, Rhuis","18 Route de Roberval, Rhuis - 60536","0601230578","a@sagittisNullamvitae.net","Délégation régionale d'Hauts-de-France");
CALL INSERTDR("Grand-Est","DR44, AD88, Gironcourt-sur-Vraine","DR Grand Est, AD Vosges, Gironcourt-sur-Vraine","8 Rue Des Chardonnerets, Gironcourt-sur-Vraine - 88206","0788189936","justo.nec@ipsumnonarcu.edu","Délégation régionale de Grand Est");

/*------------------------------------------*/
/*Insertion d'Association Départementale    */
/*------------------------------------------*/

CALL INSERTAD(1 ,"Isère", "DR84, AD38, Agnin", "DR Auvergne-Rhône-Alpes, AD Isère, Agnin", "20 Chemin Saint Vincent, Agnin - 38003", "0798589632", "tristique.neque.venenatis@infelisNulla.co.uk","Association Départementale d'Isère");
CALL INSERTAD(1 ,"Loire", "DR84, AD42, Marcoux", "DR Auvergne-Rhône-Alpes, AD Loire, Marcoux", "60 Chemin de la Garnasse, Marcoux - 42136", "0663387698", "felis@netuset.ca","Association Départementale de la Loire");
CALL INSERTAD(1 ,"Ain", "DR84, AD01, Bourg-en-Bresse", "DR Auvergne-Rhône-Alpes, AD Ain, Bourg-en-Bresse", "224 allee des bouvreuils, Bourg-en-Bresse - 01053", "0718887898", "eu.elit.Nulla@volutpatNulladignissim.co.uk","Association Départementale de l'Ain");
CALL INSERTAD(1 ,"Rhône", "DR84, AD69, Lyon", "DR Auvergne-Rhône-Alpes, AD Rhône, Lyon", "54 Avenue Maréchal de Saxe, Lyon 6e Arrondissement - 69386", "0489364110", "nunc@libero.co.uk","Association Départementale du Rhône");
CALL INSERTAD(1 ,"Savoie", "DR84, AD73, Bassens", "DR Auvergne-Rhône-Alpes, AD Savoie, Bassens", "136 Allée des cerisiers, Bassens - 73031", "0896568741", "enim@eterosProin.edu","Association Départementale de Savoie");
CALL INSERTAD(1 ,"Ardèche", "DR84, AD07, Burzet", "DR Auvergne-Rhône-Alpes, AD Ardèche, Burzet", "137 Chemin du Vernet, Burzet - 07045", "0752321544", "a.tortor.Nunc@sociisnatoque.co.uk","Association Départementale d'Ardèche");

CALL INSERTAD(2 ,"Calvados", "DR28, AD14, Ablon", "DR Normandie, AD Calvados, Ablon", "159 Chemin bailleul, Ablon - 14001", "0654785245", "Duis@vitaediam.co.uk","Association Départementale de Calvados");
CALL INSERTAD(2 ,"Eure", "DR28, AD27, Aclou", "DR Normandie, AD Eure, Aclou", "1 Impasse de la Pie, Aclou - 27001", "0645859535", "ornare.elit.elit@neque.com","Association Départementale de Eure");
CALL INSERTAD(2 ,"Manche", "DR28, AD50, Besneville", "DR Normandie, AD Manche, Besneville", "12 Route de Saint Sauveur, Besneville - 50049", "0785956535", "lacinia@elitCurabitur.net","Association Départementale de Manche");
CALL INSERTAD(2 ,"Orne", "DR28, AD61, Barville", "DR Normandie, AD Orne, Barville", "4 Place Bellevue, Barville - 61026", "0612327565", "a.enim.Suspendisse@lacus.com","Association Départementale de Orne");
CALL INSERTAD(2 ,"Seine-Maritime", "DR28, AD76, Dancourt", "DR Normandie, AD Seine-Maritime, Dancourt", "5 Rue de l’Eglise, Dancourt - 76211", "0712427487", "Aliquam@accumsan.org","Association Départementale de Seine-Maritime");

CALL INSERTAD(3 ,"Haute-Corse", "DR94, AD2B, Aghione", "DR Corse, AD Haute-Corse, Aghione", "753 Samuletto, Aghione - 2B002", "0732032415", "rhoncus.Proin@portaelit.edu","Association Départementale d'Haute-Corse");
CALL INSERTAD(3 ,"Corse-du-Sud", "DR94, AD2A, Arbori", "DR Corse, AD Corse-du-Sud, Arbori", "122 Forno, Arbori - 2A019", "0655448562", "Phasellus@aliquet.co.uk","Association Départementale de Corse-du-Sud");

CALL INSERTAD(4 ,"Morbihan", "DR53, AD56, Ambon", "DR Bretagne, AD Morbihan, Ambon", "13 Allee de Port Lestre, Ambon - 56002", "0789882565", "ornare.elit.elit@neque.com","Association Départementale de Morbihan");
CALL INSERTAD(4 ,"Finistère", "DR53, AD29, Argol", "DR Bretagne, AD Finistère, Argol", "259a Cameros, Argol - 29001", "0455987785", "non.sollicitudin@luctusvulputatenisi.com","Association Départementale de Finistère");
CALL INSERTAD(4 ,"Ille-et-Vilaine", "DR53, AD35, Langon", "DR Bretagne, AD Ille-et-Vilaine, Langon", "4 Chatillon, Langon - 35145", "0423339845", "lacus.Mauris.non@posuereatvelit.com","Association Départementale d'Ille-et-Vilaine");

CALL INSERTAD(5 ,"Aude", "DR76, AD11, Carcassonne", "DR Occitanie, AD Aude, Carcassonne", "115 Allee Jean Lambert, Carcassonne - 11069", "0656369841", "odio@rutrumFusce.com","Association Départementale de Aude");

CALL INSERTAD(6 ,"Eure-et-Loir", "DR24, AD28, Denonville", "DR Centre-Val de Loire, AD Eure-et-Loir, Denonville", "2 Rue des Sapins, Denonville - 28129", "0621487836", "vestibulum.nec@idante.edu","Association Départementale d'Eure-et-Loir");
CALL INSERTAD(6 ,"Loiret", "DR24, AD45, Baule", "DR Centre-Val de Loire, AD Loiret, Baule", "5 Chemin des Belloues, Baule - 45024", "0699857845", "vestibulum.nec@idante.edu","Association Départementale de Loiret");

CALL INSERTAD(7 ,"Paris", "DR11, AD75, Paris", "DR Île-de-France, AD Paris, Paris", "5 Allée Henry Dunant, Paris 14e Arrondissement - 75114", "0744963320", "massa.Vestibulum@ut.com","Association Départementale de Paris");
CALL INSERTAD(7 ,"Paris", "DR11, AD75, Paris", "DR Île-de-France, AD Paris, Paris", "75 Rue des Haies, Paris 20e Arrondissement - 75120", "0666214875", "nulla.at@mus.ca","Association Départementale de Paris");
CALL INSERTAD(7 ,"Seine-et-Marne", "DR11, AD77, Vaucourtois", "DR Île-de-France, AD Seine-et-Marne, Vaucourtois", "1b Place de la Mairie, Vaucourtois - 77484", "0622305041", "in.dolor.Fusce@aliquamiaculislacus.ca","Association Départementale de Seine-et-Marne");
CALL INSERTAD(7 ,"Yvelines", "DR11, AD78, Thoiry", "DR Île-de-France, AD Yvelines, Thoiry", "28a Chemin de la Haie Baldé, Thoiry - 78616", "0780902235", "sapien@ligulaAliquamerat.com","Association Départementale de Yvelines");

CALL INSERTAD(8 ,"Oise", "DR32, AD60, Rhuis", "DR Hauts-de-France, AD Oise, Rhuis", "18 Route de Roberval, Rhuis - 60536", "0601230578", "a@sagittisNullamvitae.net","Association Départementale d'Oise");
CALL INSERTAD(8 ,"Somme", "DR32, AD80, Embreville", "DR Hauts-de-France, AD Somme, Embreville", "2 Rue Roland Cave, Embreville - 80265", "0860237045", "Integer.id@cubiliaCurae.ca","Association Départementale de Somme");
CALL INSERTAD(8 ,"Aisne", "DR32, AD02, Chaourse", "DR Hauts-de-France, AD Aisne, Chaourse", "19 Rue de Montcornet, Chaourse - 02160", "0899663342", "convallis.ante.lectus@semper.org","Association Départementale d'Aisne");

-- CALL INSERTAD(9 ,"Dept", "DR53, AD, ville", "DR Bretagne, AD Dept, ville", "adresse", "tel", "mail","Association Départementale d'dept");

/*------------------------------------------*/
/*Insertion d'Unités Opérationnelles        */
/*------------------------------------------*/

CALL INSERTUO(1 ,"Centre de Bourg-en-Bresse", "Siège de l'AD, Bourg-en-Bresse", "DR AURA, AD AIN, Bourg-en-Bresse", "224 allee des bouvreuils, Bourg-en-Bresse - 01053", "0718887898", "eu.elit.Nulla@volutpatNulladignissim.co.uk","Siège de l'association départementale de l'Ain", 3);
CALL INSERTUO(1 ,"Centre d'Ambronay", "Centre 01, Ambronay", "DR AURA, AD AIN, Ambronay", "15 Chemin de Ronde, Ambronay - 01007", "0636967410", "dui.Cras@nibhvulputatemauris.org","Centre 1 de l'Unité Opérationnelle d'Ambronay", 3);
CALL INSERTUO(1 ,"Centre d'Ambronay", "Centre 02, Ambronay", "DR AURA, AD AIN, Ambronay", "15 Chemin de Ronde, Ambronay - 01007", "0636967410", "dui.Cras@nibhvulputatemauris.org","Centre 2 de l'Unité Opérationnelle d'Ambronay", 3);
CALL INSERTUO(1 ,"Centre d'Ambronay", "Centre 03, Ambronay", "DR AURA, AD AIN, Ambronay", "15 Chemin de Ronde, Ambronay - 01007", "0636967410", "dui.Cras@nibhvulputatemauris.org","Centre 3 de l'Unité Opérationnelle d'Ambronay", 3);
CALL INSERTUO(1 ,"Centre d'Andert-et-Condon", "Centre 04, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Centre 4 de l'Unité Opérationnelle d'Andert-et-Condon", 3);
CALL INSERTUO(1 ,"Centre d'Andert-et-Condon", "Centre 05, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Centre 5 de l'Unité Opérationnelle d'Andert-et-Condon", 3);
CALL INSERTUO(1 ,"Centre d'Andert-et-Condon", "Centre 06, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Centre 6 de l'Unité Opérationnelle d'Andert-et-Condon", 3);
CALL INSERTUO(1 ,"Centre d'Andert-et-Condon", "Centre 07, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Centre 7 de l'Unité Opérationnelle d'Andert-et-Condon", 3);
CALL INSERTUO(1 ,"Dépot d'Andert-et-Condon", "Dépot 01, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Dépot 1 de l'Unité Opérationnelle d'Andert-et-Condon", 3);
CALL INSERTUO(1 ,"Entrepot d'Andert-et-Condon", "Entrepot 01, Andert-et-Condon", "DR AURA, AD AIN, Andert-et-Condon", "29 Chemin des Roches, Andert-et-Condon - 01009", "0636727310", "Pellentesque.ultricies.dignissim@feugiat.edu","Entrepot 1 de l'Unité Opérationnelle d'Andert-et-Condon", 3);

-- CALL INSERTUO(1 ,"UO1", "UO, UO01, Lyon", "UO AURA, AD RHONE, Bourg en Bresse", "Une Adresse GIGA FLEMME", "0618880104", "yohan.lapierre@etu.univ-lyon1.fr","", 1);

/*------------------------------------------*/
/*Insertion d'Utilisateurs                  */
/*------------------------------------------*/

CALL insertUser("D2RDC2A03GA", "gailliard", "Axel", "p2107616", "Développeur 2, Etudiant Lyon 1", true, NULL);
CALL insertUser("D1RDC2A03LY", "LAPIERRE", "Yohan", "p2103678", "Développeur 1, Etudiant Lyon 1", true, 1);
CALL insertUser("T01RDC0A98SJ", "Stout", "Jane", "0000", "Utilisateur 01 de Test", false, 1);
CALL insertUser("T02RDC0A09ML", "Montgomery", "Lysandra", "0000", "Utilisateur 02 de Test", false, 2);
CALL insertUser("T03RDC0A08BK", "Brown", "Kylan", "0000", "Utilisateur 03 de Test", false, 2);
CALL insertUser("T04RDC0A02JE", "Jager", "Eren", "0000", "Utilisateur 04 de Test", false, 1);
CALL insertUser("T05RDC0A01WG", "Wise", "Geoffrey", "0000", "Utilisateur 05 de Test", false, 1);
CALL insertUser("T06RDC0A00GL", "Guerra", "Leslie", "0000", "Utilisateur 06 de Test", false, 2);
CALL insertUser("T07RDC0A04RC", "Robertson", "Carl", "0000", "Utilisateur 07 de Test", false, 1);
CALL insertUser("T08RDC0A75SC", "Santiago", "Chaney", "0000", "Utilisateur 08 de Test", false, 1);
CALL insertUser("T09RDC0A84BI", "Beasley", "Iris", "0000", "Utilisateur 09 de Test", false, 2);
CALL insertUser("T10RDC0A95BN", "Burnett", "Nathan", "0000", "Utilisateur 10 de Test", false, 2);

/*------------------------------------------*/
/*Insertion de Droits d'Utilisateurs        */
/*------------------------------------------*/

INSERT INTO Administrer VALUES (3, 2);
INSERT INTO Administrer VALUES (3, 4);
INSERT INTO Administrer VALUES (3, 6);
INSERT INTO Administrer VALUES (3, 8);
INSERT INTO Administrer VALUES (4, 1);
INSERT INTO Administrer VALUES (4, 3);
INSERT INTO Administrer VALUES (5, 1);
INSERT INTO Administrer VALUES (5, 7);
INSERT INTO Administrer VALUES (5, 2);
INSERT INTO Administrer VALUES (6, 9);
INSERT INTO Administrer VALUES (6, 5);

-- INSERT INTO Gerer VALUES (3, 1, 2);

/*------------------------------------------*/
/*Insertion des Systèmes                    */
/*------------------------------------------*/

INSERT INTO Systeme VALUES (null, "Windows 10", "Windows", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Windows 11", "Windows", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Windows 8", "Windows", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Windows 7", "Windows", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Debian 10", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Debian 8", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "MacOS", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Android", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "IOS", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "Ubuntu Touch", "Linux", "Aucune", "");
INSERT INTO Systeme VALUES (null, "GNU", "Linux", "Aucune", "");

/*------------------------------------------*/
/*Insertion des Statuts                     */
/*------------------------------------------*/

INSERT INTO Statut VALUES (null, "Préparation", "Disponible", "Actif", null);
INSERT INTO Statut VALUES (null, "Mise en Service", "Opérationnel", "Actif", null);
INSERT INTO Statut VALUES (null, "Maintenance", "Opérationnel", "Actif", null);
INSERT INTO Statut VALUES (null, "Mise Hors Service", "Hors Service", "Hors Service", "Rupture des liens avec tous les éléments associés");
INSERT INTO Statut VALUES (null, "Prépa Recyclage", "Obsolète", "Hors Service", "Après Mise hors service");
INSERT INTO Statut VALUES (null, "Recyclage", "Hors Parc", "Hors Parc", null);
INSERT INTO Statut VALUES (null, "Don", "Hors Parc", "Hors Parc", null);
INSERT INTO Statut VALUES (null, "Vol", "Hors Parc", "Hors Parc", null);
INSERT INTO Statut VALUES (null, "Résiliation", "Résilié", "Résilié", "Uniquement pour les abonnements");

/*------------------------------------------*/
/*Insertion des Types de Logiciels          */
/*------------------------------------------*/

INSERT INTO typelogiciel VALUES (null, "Office");
INSERT INTO typelogiciel VALUES (null, "Antivirus");
INSERT INTO typelogiciel VALUES (null, "Prise de main à distance");
INSERT INTO typelogiciel VALUES (null, "Protection");
INSERT INTO typelogiciel VALUES (null, "Autres Logiciels");

/*------------------------------------------*/
/*Insertion des Logiciels                   */
/*------------------------------------------*/

INSERT INTO Logiciel VALUES (null, "Word", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "Excel", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "PowerPoint", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "Access", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "Publisher", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "OutLook", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "OneNote", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);
INSERT INTO Logiciel VALUES (null, "Team", "Microsoft Office", "Office 2022", "Pack Microsoft Office", 1);

INSERT INTO Logiciel VALUES (null, "Avast", null, "2022", "Version D'essaie", 2);
INSERT INTO Logiciel VALUES (null, "Windows Defender", null, "2022", "AntiVirus par défaut de Windows", 2);

INSERT INTO Logiciel VALUES (null, "TeamSpeak", null, "2022", "Logiciel de Discussions", 5);
INSERT INTO Logiciel VALUES (null, "OBS Studior", null, "2022", "Logiciel d'enregistrement d'écran", 5);
INSERT INTO Logiciel VALUES (null, "PhotoShop", null, "2022", "Logiciel de montage photo", 5);
INSERT INTO Logiciel VALUES (null, "Filmora", null, "2022", "Logiciel de montage vidéo", 5);

/*------------------------------------------------*/
/*Insertion de Comptes Utilisateurs d'Ordinateur  */
/*------------------------------------------------*/

INSERT INTO compte_utilisateur VALUES(null, "Admin", "admin", null, true, "Compte Administrateur");
INSERT INTO compte_utilisateur VALUES(null, "Root", "root", null, true, "Compte Administrateur par Défault");

/*----------------------------------------------*/
/*Insertion des particularités d'imprimantes    */
/*----------------------------------------------*/

INSERT INTO particularite VALUES (null, "Noir et Blanc");
INSERT INTO particularite VALUES (null, "Couleurs");
INSERT INTO particularite VALUES (null, "Scanner");
INSERT INTO particularite VALUES (null, "Copieur");
INSERT INTO particularite VALUES (null, "3 Dimensions");

/*----------------------------------------------*/
/*Insertion des Réseaux                         */
/*----------------------------------------------*/

INSERT INTO reseau VALUES (null, "ADSL");
INSERT INTO reseau VALUES (null, "Fibre");
INSERT INTO reseau VALUES (null, "Mobile");

/*----------------------------------------------*/
/*Insertion des Connexions                      */
/*----------------------------------------------*/

INSERT INTO connexion VALUES (null, "ADSL");
INSERT INTO connexion VALUES (null, "Fibre");
INSERT INTO connexion VALUES (null, "3G");
INSERT INTO connexion VALUES (null, "4G");
INSERT INTO connexion VALUES (null, "5G");

/*----------------------------------------------*/
/*Insertion des types de Matériels              */
/*----------------------------------------------*/

INSERT INTO typemateriel VALUES (null, "Fixe", "Ordinateur");
INSERT INTO typemateriel VALUES (null, "Portable", "Ordinateur");
INSERT INTO typemateriel VALUES (null, "Fixe", "Telephone");
INSERT INTO typemateriel VALUES (null, "SmartPhone", "Telephone");
INSERT INTO typemateriel VALUES (null, "Tablette", "Telephone");

/*------------------------------------------*/
/*Insertion de Matériels      */
/*------------------------------------------*/

/*Insertion d'ordinateur      */

CALL INSERTORDINATEUR(35,"37282836T732202827","tkt",true,"orange","64","DDR4","500","pas de partition","Dell","un commentaire au hasard","1","1","1","1",NULL,NULL,'');

/*Insertion de switch      */

CALL INSERTSWITCH("180","SISCO","1229M-45C","16","3456787654567","PAS DE COMMENTAIRE","1","1");

/*Insertion d'imprimante      */

CALL INSERTIMPRIMANTE("67","HP","35-22V","0987644","PAS DE COMMENTAIRE","1","1");

/*Insertion de serveur      */

CALL INSERTSERVEUR("82","Fujitsu","35-22V","2500","9042288493","PAS DE COMMENTAIRE","1","1");

/*Insertion d'abonnement      */

CALL INSERTABONNEMENT("145","red","0612345678","0123456789","C2738392","Axel","TJC345","mdptkt","PAS DE COMMENTAIRE","1","1","1","1");

/*Insertion d'abonnement      */

CALL INSERTPOINTACCESINTERNET("12","free","reseau24","45602936","PAS DE COMMENTAIRE",1,1);

/*Insertion d'autre      */

CALL INSERTAUTRE("55","OnePlus","Nord","638293679","v6 turbo 5L7","PAS DE COMMENTAIRE","1","1");

/*Insertion de telephone      */

CALL INSERTTELEPHONE(1,"OnePlus","nord","12","256","PAS DE COMMENTAIRE","1","1","1");

/*Insertion de telephone      */

CALL INSERTRACCORDEMENT("320","marque RA","modele RA","749207ATG","RAS",1,1,1);