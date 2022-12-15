<?php
session_start();
require_once __DIR__ . "/../MariaDB.php";

if (
        !empty($_POST['ref']) &&
        strlen($_POST['ref']) <= 47 &&

        !empty($_POST['nom']) &&
        strlen($_POST['nom']) <= 35 &&

        !empty($_POST['prenom']) &&
        strlen($_POST['prenom']) <= 180 &&

        !empty($_POST['mdp']) &&
        !empty($_POST['mdpConfirm']) &&

        $_POST['mdpConfirm'] === $_POST['mdp']
    ) {

        $bool = 0;
        if (!empty($_POST['admin'])) {
            $bool = 1;
        } else {
            $bool = 0;
        }

        $array = [
            "ref" => $_POST['ref'],
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "mdp" => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
            "admin" => $bool,
            "author" => $_SESSION['User']['ID_User']
        ];

        if (!empty($_POST['com'])) {
            $array['com'] = $_POST['com'];
        } else {
            $array['com'] = "NULL";
        }

        foreach($array as $key => $value) {
            if ($value !== "mdp") {
                $array[$key] = trim(htmlentities($value));
            }
        }

        $pdo = Connexion::getDB()->get();
 
        $sql = "CALL insertUser(:ref,:nom,:prenom,:mdp,:com, :admin, :author)";
        $stmt = $pdo->prepare($sql);
    
        $stmt->execute($array);

        header('Location: /pages/utilisateurs.php');
        exit();
       
} 

header('Location: /pages/addUser.php');