<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>

    <link rel="stylesheet" href="/css/profil.css">
    <title>Profil</title>
</head>

<body>
    <?php require_once __DIR__ . "/../modules/header.php"; ?>
    <section class="container" style="">
        <div class="bg bg-secondary rounded-circle" style="width: 350px; height: 350px;">
            <img src="<?= $_SESSION['User']['Image'] ?>" style=" margin-left: 10px; margin-top: 10px;" alt="" width="330" height="330" class="rounded-circle me-2">
        </div>
        <div class="border border-secondary border-3 rounded-4 bg bg-light" style="margin: 40px 2% 0 2%;">
            <section method="POST" action="/includes/traitements/insertUser.php" style="margin: 30px 2% 0 2%;">
                <h4 class="mb-3">Informations personnelles</h4>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Prenom</p>
                        <p class="form-control"><?= $_SESSION["User"]["Prenom"] ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Nom</p>
                        <p class="form-control"><?= $_SESSION["User"]["Nom"] ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Reférence</p>
                        <p class="form-control"><?= $_SESSION["User"]["Reference_User"] ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Mail</p>
                        <p class="form-control"><?= $_SESSION["User"]["Mail"] ?></p>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="input-group">
                        <p class="input-group-text">Commentaire</p>
                        <p class="form-control" style="height: 100px;"><?= $_SESSION["User"]["Commentaire"] ?></p>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>