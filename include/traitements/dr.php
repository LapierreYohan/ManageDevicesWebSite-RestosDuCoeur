<?php

if (isset($_POST['dr'])) {
    require_once(__DIR__ . "/../../include/MariaDB.php");

    $res = Connexion::getResult("SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "')");
    echo json_encode($res);
}
