INSERT INTO Ordinateur VALUES (0,NOW(),FALSE, "Ordinateur", 'OR-n5gd5g5', 'WikipediaWallah', 'Comptabilité', true, null, '32G', null, null, null, null, null, null, null, null,1,1,null,null);


SELECT ID_Dr, ID_Site, ID_Ordinateur AS ID_Materiel, Materiel, Reference_Ordinateur AS Reference_Materiel, ID_Statut, ID_TypeMateriel, Historique
FROM Ordinateur
UNION
SELECT ID_Dr, ID_Site, ID_Imprimante AS ID_Materiel, Materiel, Reference_Imprimante AS Reference_Materiel, ID_Statut, null, Historique
FROM Imprimante
