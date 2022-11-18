INSERT INTO Ordinateur VALUES (0,NOW(),FALSE, DEFAULT, 'OR-n5gd5g5', 'WikipediaWallah', 'Comptabilité', true, null, '32G', null, null, null, null, null, 1, 1, 1,1,1,null,null, DEFAULT);
INSERT INTO Imprimante VALUES (0,NOW(),FALSE, DEFAULT, 'IM-JFjss52', 'TktFrere', 'HD800', "Serie8000", "Pas de com interessant", null, 1, 1, 1, DEFAULT);

SELECT ID_Dr, ID_Site, ID_Ordinateur AS ID_Materiel, Materiel, Reference_Ordinateur AS Reference_Materiel, ID_Statut, ID_TypeMateriel, Historique, image
FROM Ordinateur
UNION
SELECT ID_Dr, ID_Site, ID_Imprimante AS ID_Materiel, Materiel, Reference_Imprimante AS Reference_Materiel, ID_Statut, null, Historique, image
FROM Imprimante
