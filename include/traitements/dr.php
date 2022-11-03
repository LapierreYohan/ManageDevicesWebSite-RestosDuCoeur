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

} else if (isset($_POST['dr'])) {
    $res;

    if ($_SESSION['Admin'] === true) { 
        $res = Connexion::getResult("SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "') AND ID_DrParent IS NULL AND ID_SiteParent IS NULL");
        echo json_encode($res);
    } else {
        $res = Connexion::getResult("SELECT * FROM Site WHERE ID_DrParent IS NULL AND ID_SiteParent IS NULL AND ID_Dr = ANY (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "' AND (ID_Site = Any (SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION['ID_User'] . ") OR ID_Dr = ANY (SELECT ID_Dr FROM Administrer WHERE ID_User = " . $_SESSION['ID_User'] . ")))");
        echo json_encode($res);
    }
    unset($_POST['dr']);
}
