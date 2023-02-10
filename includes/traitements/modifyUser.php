<?php
session_start();
require_once __DIR__ . "/../MariaDB.php";


if (
    !empty($_POST['nom']) &&
    strlen($_POST['nom']) <= 35 &&

    !empty($_POST['prenom']) &&
    strlen($_POST['prenom']) <= 180 //&&

    // !empty($_POST['com']) &&
    // strlen($_POST['com']) <= 180

) {

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
    $sql;
    if ($_POST["id"] != "-1") {
        $sql = "Call CONTROLEDITUSER(" . $_POST["id"] . ", :nom, :prenom, :com)";
    } else {
        $sql = "Call CONTROLEDITUSER(" . $_SESSION["User"]["ID_User"] . ", :nom, :prenom, :com)";
        $_SESSION["User"]["Prenom"] = $_POST['prenom'];
        $_SESSION["User"]["Nom"] = $_POST['nom'];
        $_SESSION["User"]["Commentaire"] = $_POST['com'];


        session_destroy();
        header('Location: /index.php');
    }

    $stmt = $pdo->prepare($sql);

    $stmt->execute($array);

    header('Location: /pages/profil.php?id=' . $_POST["id"]);
    exit();
}

header('Location: /pages/profil.php');
exit();
