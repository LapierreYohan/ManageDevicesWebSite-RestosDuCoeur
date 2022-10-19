<?php
require_once("./include/MariaDB.php");

$identity = htmlentities("yohan.lapierre@restosducoeur.org");
$password = htmlentities("432");

$bdd = bddRestos();
   
$stmt = $bdd->prepare("SELECT * FROM Utilisateur WHERE Mail=\"$identity\" AND MotDePasse=\"$password\"");
$stmt->execute();


$res = $stmt->fetchAll();

    if ($res) {
        echo "Coucou \n";
    }
    
foreach ( $res as $row ) {
    echo $row['Reference_User'];
}

?>