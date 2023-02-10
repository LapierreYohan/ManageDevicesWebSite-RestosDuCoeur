<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . "/../../includes/MariaDB.php");

if (isset($_POST['buttons'])) {
    try {
        if ($_POST['buttons'] == "noneUoSelected") {
            echo '{"CAN_INTERACTION": true, "idUo": ""}';
        }
        else if ($_SESSION['Admin'] === false) {
            echo '{"CAN_INTERACTION": true, "idUo": "' . $_POST['buttons'] .'"}';
        } else {
            echo '{"CAN_INTERACTION": true, "idUo": "' . $_POST['buttons'] .'"}';
        }
        unset($_POST['buttons']);
    } catch (PDOException $Exception) {
        echo '{"CAN_INTERACTION": true, "idUo": ""}';
        unset($_POST['buttons']);
    }

} else if (isset($_POST['materiels'])) {
    try {
        $res = Connexion::getDB()->getResult("SELECT * FROM Materials ma JOIN Statut st ON st.ID_Statut = ma.ID_Statut WHERE ma.ID_Site =" . $_POST['materiels'] ." AND ma.Historique = FALSE");
    
        echo json_encode($res);

        unset($_POST['materiels']);
    } catch (PDOException $Exception) {
        echo '{}';
        unset($_POST['materiels']);
    }
}
