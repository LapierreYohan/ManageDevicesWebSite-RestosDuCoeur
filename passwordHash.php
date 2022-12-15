<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/includes/MariaDB.php");

try {
    echo "start\n";
    $bdd = Connexion::getDB()->get();
    $stmt = $bdd->query('SELECT * FROM utilisateur');
    $res = $stmt->fetchAll();

    foreach ($res as $row) {
        $mdp = password_hash($row['MotDePasse'], PASSWORD_DEFAULT);
        $bdd->exec('UPDATE utilisateur SET MotDePasse ="' . $mdp . '" WHERE Mail= "' . $row['Mail'] . '"');
        set_time_limit(10);
    }

    echo "end\n";
} catch (PDOException $Exception) {
    echo $Exception->getMessage();
}
   
// require_once __DIR__ . "/include/fonctions/debug.php";
// debug($res, true);