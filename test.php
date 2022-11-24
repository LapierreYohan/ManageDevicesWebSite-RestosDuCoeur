<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/includeq/MariaDB.php");

$res = Connexion::getDB()->getResult("SELECT * FROM Administrer WHERE ID_Dr = ANY (SELECT ID_Dr FROM Delegation_Regionale WHERE Reference ='" . "DR-RHONE" . "') AND ID_User =" . 3);
    if (empty($res) && $_SESSION['Admin'] === false) {
        echo '{"CAN_INTERACTION": false}';
    } else {
        echo '{"CAN_INTERACTION": true}';
    }
// require_once __DIR__ . "/include/fonctions/debug.php";
// debug($res, true);