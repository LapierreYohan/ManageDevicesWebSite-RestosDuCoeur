CREATE OR REPLACE VIEW Materials AS
SELECT ID_Dr, ID_Site, ID_Ordinateur AS ID_Materiel, Materiel, Reference_Ordinateur AS Reference_Materiel, ID_Statut, ID_TypeMateriel, Historique, DateInsert, image
FROM Ordinateur
UNION
SELECT ID_Dr, ID_Site, ID_Imprimante AS ID_Materiel, Materiel, Reference_Imprimante AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM Imprimante
UNION
SELECT ID_Dr, ID_Site, ID_Acces AS ID_Materiel, Materiel, Reference_Acces AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM pointaccesinternet
UNION
SELECT ID_Dr, ID_Site, ID_Raccordement AS ID_Materiel, Materiel, Reference_Raccordement AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM raccordement
UNION
SELECT ID_Dr, ID_Site, ID_Abonnement AS ID_Materiel, Materiel, Reference_Abonnement AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM abonnement
UNION
SELECT ID_Dr, ID_Site, ID_Autre AS ID_Materiel, Materiel, Reference_Autre AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM autre
UNION
SELECT ID_Dr, ID_Site, ID_Serveur AS ID_Materiel, Materiel, Reference_Serveur AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM serveur
UNION
SELECT ID_Dr, ID_Site, ID_Switch AS ID_Materiel, Materiel, Reference_Switch AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM switch
UNION
SELECT ID_Dr, ID_Site, ID_Telephone AS ID_Materiel, Materiel, Reference_Telephone AS Reference_Materiel, ID_Statut, null, Historique, DateInsert, image
FROM telephone;

Select * from Materials;
