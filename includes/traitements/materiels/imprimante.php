<?php

require_once __DIR__ . "/../../MariaDB.php";

if (
    !empty($_POST['ref']) &&
    strlen($_POST['ref']) <= 47 &&
    !empty($_POST['marque']) &&
    !empty($_POST['modele']) &&
    !empty($_POST['serie'])&& 
    (!empty($_POST['ad']) || !empty($_POST['uo']))
) {

    $sql = 'CALL INSERTIMPRIMANTE(:ref,:marque,:modele,:serie,:com ,null,:dr ,:site, "")';
    
    $array = [
        "ref" => $_POST['ref'],
        "marque" => $_POST['marque'],
        "modele" => $_POST['modele'],
        "serie" => $_POST['serie'],
    ];

    if (!empty($_POST['com'])) {
        $array['com'] = $_POST['com'];
    } else {
        $array['com'] = "NULL";
    }

    $bdd = Connexion::getDB()->get();

    if (!empty($_POST['ad'])) {
        $array['site'] = $_POST['ad'];

        $stmt = $bdd->prepare("SELECT * FROM Site WHERE ID_Site = ". $_POST['ad'] ." LIMIT 1");
        $stmt->execute();

        $res = $stmt->fetchAll();
        foreach ($res as $row) {  
            $array['dr'] = $row['ID_Dr'];
        }
    } else {
        $array['site'] = $_POST['uo'];

        $stmt = $bdd->prepare("SELECT * FROM Site WHERE ID_Site = ". $_POST['uo'] ." LIMIT 1");
        $stmt->execute();

        $res = $stmt->fetchAll();
        foreach ($res as $row) {  
            $array['dr'] = $row['ID_Dr'];
        }
    }

    foreach ($array as $key => $value) {  
        $array[$key] = trim(htmlentities($value));
    }

    $stmt = $bdd->prepare($sql);
    $stmt->execute($array);

    $sql = "SELECT * FROM particularite ORDER BY ID_Fonction"; 
    $stmt = $bdd->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    $array["ref"] = "IM-" . $array["ref"];
            
    $getIDImprimante = "SELECT * FROM Imprimante WHERE Reference_Imprimante = :ref AND Marque = :marque AND Modele = :modele AND Serie = :serie AND Commentaire = :com AND ID_Dr = :dr AND ID_Site = :site LIMIT 1";
    
    $stmt2 = $bdd->prepare($getIDImprimante);
    $stmt2->execute($array);

    $result2 = $stmt2->fetchAll();

    foreach($result as $row) {
        
        $fonction = "fonction" . str_replace(' ', '', $row['Nom']);

        if (!empty($_POST[$fonction])) {

            foreach($result2 as $row2) {
                $bdd->query("INSERT INTO Imprimer VALUES(". $row2["ID_Imprimante"] .",". $row['ID_Fonction'] .")");
            }
        
        }

    }

    header('Location: /pages/home.php');

} else if (!empty($_POST['uo'])) {
    header('Location: /pages/formMateriel.php?materiel=imprimante&uo='.$_POST['uo']);
} else if (!empty($_POST['ad'])) {
    header('Location: /pages/formMateriel.php?materiel=imprimante&ad='.$_POST['ad']);
} else {
    header('Location: /index.php');
}