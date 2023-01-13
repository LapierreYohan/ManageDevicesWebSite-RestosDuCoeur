<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>
    
    <title>Add Materiel</title>
</head>

<body>

    <?php require_once __DIR__ . "/../modules/header.php";?>

    <section class="container">
        <div class="border border-secondary border-3 rounded-4 bg bg-light" style="margin: 50px 10% 0 10%;">
            <form method="GET" action="/pages/formMateriel.php" style="margin: 30px 5% 0 5%;">
                
                <h4 class="mb-3">Quel type de Matériel voulez-vous ajouter ?</h4>
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><label for="mat">Matériel <p style="color: red; display: inline;">*</p></label></span>
                        <select class="form-select" id="mat" name="materiel">
                            <option selected="ordinateur">Ordinateur</option>
                            <option value="imprimante">Imprimante</option>
                            <option value="serveur">Serveur</option>
                            <option value="switch">Switch</option>
                            <option value="pointdaccesinternet">Point D'acces Internet</option>
                            <option value="abonnement">Abonnement</option>
                            <option value="raccordement">Raccordement</option>
                            <option value="telephone">Téléphone</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                </div>  

                <?php if (!empty($_GET['uo'])) : ?>
                    <input type="hidden" name="uo" value="<?= $_GET['uo'] ?>">
                <?php elseif (!empty($_GET['ad'])) : ?>    
                    <input type="hidden" name="ad" value="<?= $_GET['ad'] ?>">
                <?php else :
                    header('Location: /pages/home.php');
                    die();
                ?>
                <?php endif; ?>
                <button class="w-35 btn btn-secondary btn-lg mb-4" type="submit">Allez au Formulaire</button>
            </form>
        </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>