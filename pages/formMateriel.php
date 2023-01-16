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
            <?php
                if (!empty($_GET['materiel'])) {  
                    include_once __DIR__ . "/../modules/forms/". $_GET['materiel'] .".php";      
                }
            ?>
        </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>