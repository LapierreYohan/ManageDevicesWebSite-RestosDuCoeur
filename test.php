<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/includes/MariaDB.php");

$res = Connexion::getDB()->getResult("SELECT * FROM Materials WHERE ID_Site =" . "1" ." AND Historique = FALSE");
print_r($res);
   
// require_once __DIR__ . "/include/fonctions/debug.php";
// debug($res, true);