<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . "/../../include/MariaDB.php");

if (isset($_POST['buttons'])) {

    $res = Connexion::getResult("SELECT * FROM Administrer WHERE ID_Dr = ANY (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['buttons'] . "') AND ID_User =" . $_SESSION['ID_User']);
    if (empty($res) && $_SESSION['Admin'] === false) {
        echo '{"CAN_INTERACTION": false}';
    } else {
        echo '{"CAN_INTERACTION": true}';
    }
    unset($_POST['buttons']);

} else if (isset($_POST['materiels'])) {
    $res = Connexion::getResult("SELECT * FROM Site WHERE ID_SiteParent =" . $_POST['materiels']);
    echo json_encode($res);

    unset($_POST['materiels']);
} else if (isset($_POST['ad'])) {
 
    $res = Connexion::getResult("SELECT * FROM Site WHERE ID_SiteParent =" . $_POST['ad']);
    echo json_encode($res);
    
    unset($_POST['dr']);
}
