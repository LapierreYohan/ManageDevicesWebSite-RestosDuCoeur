<?php
session_start();
require_once("../includes/fonctions/auth.php");
redirectUser();
require_once __DIR__ . "/../includes/MariaDB.php";

$_idurl = false;

if (!empty($_GET["id"])) {
    $rec = Connexion::getDB()->getResult("Select * from Utilisateur where ID_User = " . $_GET["id"]);
    if ($rec[0]["ID_Author"] != NULL && $rec[0]["ID_Author"] != 0) {
        $rec2 = Connexion::getDB()->getResult("Select * from Utilisateur where ID_User = " . $rec[0]["ID_Author"]);
        if ($rec[0]["Admin_User"]) {
            $adminverif = "administrateur";
        } else {
            $adminverif = "non administrateur";
        }
        $res = $rec2[0]["Nom"] . ' ' . $rec2[0]["Prenom"] . ' ' . $rec2[0]["Reference_User"] . ' ' . $adminverif;
    } else {
        $res = "Zeus (Ζεύς)";
    }
    $_idurl = true;
} elseif (!empty($_SESSION["User"]["ID_Author"])) {
    $rec = Connexion::getDB()->getResult("Select * from Utilisateur where ID_User = " . $_SESSION["User"]["ID_Author"]);
    if ($rec[0]["Admin_User"]) {
        $adminverif = "administrateur";
    } else {
        $adminverif = "non administrateur";
    }
    $res = $rec[0]["Nom"] . ' ' . $rec[0]["Prenom"] . ' ' . $rec[0]["Reference_User"] . ' ' . $adminverif;
} else {
    $res = "Zeus (Ζεύς) 2";
}


?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>

    <link rel="stylesheet" href="/css/profil.css">
    <title>Profil</title>
</head>

<body>
    <?php require_once __DIR__ . "/../modules/header.php"; ?>
    <section class="container">
        <div class="bg bg-secondary rounded-circle" style="width: 350px; height: 350px;">
            <img src="<?php if ($_idurl == true) {
                            echo $rec[0]['Image'];
                        } else {
                            echo $_SESSION['User']['Image'];
                        } ?>" style=" margin-left: 10px; margin-top: 10px;" alt="" width="330" height="330" class="rounded-circle me-2">
        </div>
        <div class="border border-secondary border-3 rounded-4 bg bg-light" style="margin: 40px 2% 0 2%;">
            <section method="POST" action="/includes/traitements/insertUser.php" style="margin: 30px 2% 0 2%;">
                <h4 class="mb-3">Informations personnelles</h4>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Prenom</p>
                        <p class="form-control"><?php if ($_idurl) {
                                                    echo $rec[0]['Prenom'];
                                                } else {
                                                    echo $_SESSION["User"]["Prenom"];
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Nom</p>
                        <p class="form-control"><?php if ($_idurl) {
                                                    echo $rec[0]['Nom'];
                                                } else {
                                                    echo $_SESSION["User"]["Nom"];
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Reférence</p>
                        <p class="form-control"><?php if ($_idurl) {
                                                    echo $rec[0]['Reference_User'];
                                                } else {
                                                    echo $_SESSION["User"]["Reference_User"];
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Mail</p>
                        <p class="form-control"><?php if ($_idurl) {
                                                    echo $rec[0]['Mail'];
                                                } else {
                                                    echo $_SESSION["User"]["Mail"];
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Créateur</p>
                        <p class="form-control"><?= $res ?></p>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Commentaire</p>
                        <p class="form-control" style="height: 100px;"><?php if ($_idurl) {
                                                                            echo $rec[0]['Commentaire'];
                                                                        } else {
                                                                            echo $_SESSION["User"]["Commentaire"];
                                                                        } ?></p>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>