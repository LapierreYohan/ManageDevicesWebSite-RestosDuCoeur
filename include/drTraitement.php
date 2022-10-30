<?php

if (isset($_POST['dr'])) {
    require_once(__DIR__ . "/../include/MariaDB.php");
    $bdd = bddRestos();

    $stmt = $bdd->query("SELECT * FROM Site WHERE ID_Dr = (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . $_POST['dr'] . "')");
    $res = $stmt->fetchAll();

    echo json_encode($res);

}
