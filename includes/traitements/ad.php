<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . "/../../includes/MariaDB.php");

if (isset($_POST['buttons'])) {
    //On utilise un ID ici !!!!
    $res = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_Site= ".$_POST['buttons']." AND ID_User = " . $_SESSION['User']['ID_User']);
    if (empty($res) && $_SESSION['Admin'] === false) {

        $res = Connexion::getDb()->getResult("SELECT * FROM Site WHERE ID_Dr = ANY (SELECT * FROM Administrer) AND ID_Site = ".$_POST['buttons']);
        if (empty($res)) {
            echo '{"CAN_INTERACTION": false, "idAd": ""}';
        } else {
            echo '{"CAN_INTERACTION": true, "idAd": "' . $_POST['buttons'] .'"}';
        }
    } else {
        echo '{"CAN_INTERACTION": true, "idAd": "' . $_POST['buttons'] .'"}';
    }
    unset($_POST['buttons']);

} else if (isset($_POST['materiels'])) {

    $res = Connexion::getDB()->getResult("SELECT * FROM Materials ma JOIN Statut st ON st.ID_Statut = ma.ID_Statut WHERE ma.ID_Site =" . $_POST['materiels'] ." AND ma.Historique = FALSE");
   
    echo json_encode($res);

    unset($_POST['materiels']);
} else if (isset($_POST['ad'])) {
 
    $res = Connexion::getDB()->getResult("SELECT * FROM Site WHERE Statut = TRUE AND ID_SiteParent =" . $_POST['ad'] . " ORDER BY Reference ASC");
    echo json_encode($res);
    
    unset($_POST['dr']);
}
