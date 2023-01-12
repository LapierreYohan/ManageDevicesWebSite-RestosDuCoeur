<?php
session_start();
require_once __DIR__ . "/../MariaDB.php";

if (
    !empty($_POST['nom']) &&
    strlen($_POST['nom']) <= 35 &&

    !empty($_POST['prenom']) &&
    strlen($_POST['prenom']) <= 180

) {

    $bool = 0;
    if (!empty($_POST['admin'])) {
        $bool = 1;
    } else {
        $bool = 0;
    }

    $array = [
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
    ];

    if (!empty($_POST['com'])) {
        $array['com'] = $_POST['com'];
    } else {
        $array['com'] = "NULL";
    }

    foreach ($array as $key => $value) {
        if ($value !== "mdp") {
            $array[$key] = trim(htmlentities($value));
        }
    }

    $pdo = Connexion::getDB()->get();

    $sql = "Update User SET nom = :nom, prenom = :prenom";
    $stmt = $pdo->prepare($sql);

    $stmt->execute($array);

    header('Location: /pages/profil.php');
    exit();
}

header('Location: /pages/profil.php');
