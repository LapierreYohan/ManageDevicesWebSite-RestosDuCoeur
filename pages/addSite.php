<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>
    
    <link rel="stylesheet" href="/css/profil.css">
    <title>Add Sites</title>
</head>

<body>
    <?php require_once __DIR__ . "/../modules/header.php";?>

    <?php if (!empty($_GET['dr'])) {?>

        <h4>Coucou</h4>

    <?php } else { ?>
        <section class="container">
            <div class="border border-secondary border-3 rounded-4 bg bg-light" style="margin: 50px 10% 0 10%;">
                <form method="POST" enctype="multipart/form-data" style="margin: 30px 5% 0 5%;">
                    <h4 class="mb-3">Informations</h4>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="ref">Ref</label></span>
                            <input type="text" class="form-control" id="ref" name="ref" placeholder="Réference" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="nom_court">Nom Court</label></span>
                                <input type="text" class="form-control" id="nom_court" name="nom_court" placeholder="Nom Court" required>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="nom_long">Nom Long</label></span>
                                <input type="text" class="form-control" id="nom_long" name="nom_long" placeholder="Nom Long" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="adresse">Adresse</label></span>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="customFile" style="display: none;">Upload</label>
                        <input type="file" class="form-control" id="customFile" name="file">
                    </div>

                    <hr class="my-4">
                    <h4 class="mb-3">Contact</h4>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="mail">Mail</label></span>
                                <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail" required>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="tel">Tel</label></span>
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="Tel" required>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h4 class="mb-3">Commentaire</h4>
                    <div class="col mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="com">Com</label></span>
                            <textarea class="form-control" id="com" name="com" style="height: 100px;" required> </textarea>
                        </div>
                    </div>

                    <button class="w-35 btn btn-primary btn-lg mb-4" type="submit">Ajouter un Site</button>
                </form>
            </div>
        </section>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>