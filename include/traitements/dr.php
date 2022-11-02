<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['dr'])) {
    require_once(__DIR__ . "/../../include/MariaDB.php");
    $res;

    if ($_SESSION['Admin'] === true) { 
        $res = Connexion::getResult("SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "')");
        echo json_encode($res);
    } else {
        $res = Connexion::getResult("SELECT * FROM Site WHERE ID_Dr = ANY (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "' AND (ID_Site = Any (SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION['ID_User'] . ") OR ID_Dr = ANY (SELECT ID_Dr FROM Administrer WHERE ID_User = " . $_SESSION['ID_User'] . ")))");
        echo json_encode($res);
    }
}
