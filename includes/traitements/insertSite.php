<?php
require_once __DIR__ . "/../MariaDB.php";

if (
        !empty($_POST['ref']) &&
        strlen($_POST['ref']) <= 47 &&

        !empty($_POST['nom_court']) &&
        strlen($_POST['nom_court']) <= 35 &&

        !empty($_POST['nom_long']) &&
        strlen($_POST['nom_long']) <= 180 &&

        !empty($_POST['adresse']) &&
        strlen($_POST['adresse']) <= 100
    ) {
        $array = [
            "ref" => $_POST['ref'],
            "nom_court" => $_POST['nom_court'],
            "nom_long" => $_POST['nom_long'],
            "adresse" => $_POST['adresse']
        ];

        if (!empty($_POST['mail']) &&  filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && strlen($_POST['nom_long']) <= 100) {
            $array['mail'] = $_POST['mail'];
        } else {
            $array['mail'] = "NULL";
        }

        if (!empty($_POST['tel']) && preg_match("/^[0-9]{10}/", $_POST['tel']) && strlen($_POST['nom_long']) <= 10) {
            $array['tel'] = $_POST['tel'];
        } else {
            $array['tel'] = "NULL";
        }

        if (!empty($_POST['com'])) {
            $array['com'] = $_POST['com'];
        } else {
            $array['com'] = "NULL";
        }

        if (!empty($_POST['file'])) {
            $array['file'] = "DEFAULT";
        } else {
            $array['file'] = "DEFAULT";
        }

        foreach($array as $key => $value) {
            if ($value !== "file") {
                $array[$key] = trim(htmlentities($value));
            }
        }

        $pdo = Connexion::getDB()->get();

        if (!empty($_POST['dr'])) {

            $array['site'] = $_POST['dr'];
            $stmt;

            if ($array['file'] == "DEFAULT") {
                unset($array['file']);
                $sql = "CALL INSERTAD(:site, :ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com, NULL)";
                $stmt = $pdo->prepare($sql);
            } else {
                $sql = "CALL INSERTAD(:site, :ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com, :file)";
                $stmt = $pdo->prepare($sql);
            }
    
            $stmt->execute($array);
    
            header('Location: /pages/home.php');
            exit();
        } else if (!empty($_POST['ad'])) {

            $dr = Connexion::getDB()->getResult("SELECT * FROM Site WHERE ID_Site=". $_POST['ad']);

            $array['dr'] = $dr[0]['ID_Dr'];
            $array['site'] = $_POST['ad'];
            $stmt;

            if ($array['file'] == "DEFAULT") {
                unset($array['file']);
                $sql = "CALL INSERTUO(:dr, :ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com,:site, NULL)";
                $stmt = $pdo->prepare($sql);
            } else {
                $sql = "CALL INSERTAD(:dr, :ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com,:site, :file)";
                $stmt = $pdo->prepare($sql);
            }
    
            $stmt->execute($array);
    
            header('Location: /pages/home.php');
            exit();
        }
        else {
            $stmt;
            if ($array['file'] == "DEFAULT") {
                unset($array['file']);
                $sql = "CALL INSERTDR(:ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com, NULL)";
                $stmt = $pdo->prepare($sql);
            } else {
                $sql = "CALL INSERTDR(:ref,:nom_court,:nom_long,:adresse,:tel,:mail,:com, :file)";
                $stmt = $pdo->prepare($sql);
            }
    
            $stmt->execute($array);
    
            header('Location: /pages/home.php');
            exit();
        }
} 

header('Location: /pages/addSite.php');