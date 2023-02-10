<?php
session_start();
require_once("../includes/fonctions/auth.php");
redirectUser();
isAdmin();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>

    <title>Matériels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/list-group.css">
</head>

<body>

    <?php require_once __DIR__ . "/../modules/header.php";?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block mt-5 sidebar2 collapse">
                <div class="" style="font-size: larger;">
                    <a href="/pages/parametres.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4" style="font-size: larger;">Paramètres</span>
                    </a>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <?php
                        if(empty($_GET['param'])) {
                            echo '<a href="/pages/parametres.php" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        <b>Informations</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "utilisateurs") {
                            echo '<a href="/pages/parametres.php?param=utilisateurs" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=utilisateurs" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        <b>Utilisateurs</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "statuts") {
                            echo '<a href="/pages/parametres.php?param=statuts" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=statuts" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        <b>Statuts</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "logiciels") {
                            echo '<a href="/pages/parametres.php?param=logiciels" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=logiciels" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        <b>Types Logiciels</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "materiels") {
                            echo '<a href="/pages/parametres.php?param=materiels" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=materiels" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        <b>Types Matériels</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "connexions") {
                            echo '<a href="/pages/parametres.php?param=connexions" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=connexions" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                        <b>Connexions</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "reseaux") {
                            echo '<a href="/pages/parametres.php?param=reseaux" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=reseaux" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        <b>Réseaux</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "systemes") {
                            echo '<a href="/pages/parametres.php?param=systemes" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=systemes" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        <b>Systèmes</b>
                        </a>
                    </li>
                    <li>
                        <?php
                        if(!empty($_GET['param']) && $_GET['param'] == "particularites") {
                            echo '<a href="/pages/parametres.php?param=particularites" class="nav-link active" aria-current="page">';
                        } else {
                            echo '<a href="/pages/parametres.php?param=particularites" class="nav-link link-light">';
                        }
                        ?>
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        <b>Particularités</b>
                        </a>
                    </li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-9 ms-sm-auto col-lg-10">
                <div class="container py-4 bg-dark border-dark rounded-3" style="margin-top: 3%; width: 90%; margin-left: 5%;">
                    <div class="row">
                        <?php
                        if(empty($_GET['param'])) {
                        ?>
                            <h2 class="pb-2 border-bottom resetSelector ms-5" style="width: 90%;">Informations</h2>

                            <p class="text-secondary ms-5 mt-3" style="font-size: 18px; width: 90%;">L'ensemble des paramètres sont intéractifs avec le reste de la base de données. Ils permettent de génériser les fonctionnalités possibles. Les particularités techniques des matériels sont modifiable dans ce menu. Les icones des différents matériels sont modifiables dans le dossier source du site web. Il suffit simplement de changer les images dans le dossier "img/icon/" et de remplacer les différentes icones.</br></p>

                            <div class="alert alert-danger d-flex align-items-center ms-5 mt-3" role="alert" style="width: 90%; height: 50px;">
                                <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 20px;"></i>                     
                                <p class="mt-3" style="font-size: 19px;">Les événements graphiques ne sont pas automatique. L'ajout de types de matériels ne changera pas l'icon.</p> 
                            </div>

                            <p class="text-secondary ms-5 mt-3" style="font-size: 18px; width: 90%;">Les différents paramètres présents dans cette page sont exclusivements réservés aux administrateurs générals du Site Web et ne sont pas accessibles aux autres utilisateurs. Les utilisateurs doivent également être créés par un Administrateur, il est impossible de créer soi-même son compte utilisateur étant ainsi un site privé.</br></p>

                            <p class="text-secondary ms-5 mt-3" style="font-size: 18px; width: 90%;">Les systèmes d'exploitations sont exclusivement réservés aux Ordinateurs générés par les utilisateurs du site Web. Les logiciels sont également exclusif aux ordinateurs.</br></p>

                            <p class="text-secondary ms-5 mt-3" style="font-size: 18px; width: 90%;">Les status de matériels sont à titre indicatif. Hors, si vous souhaitez créer de nouveaux statuts ils ne serront pas inscrit dans la logique de modification de matériel.</br></p>

                        <?php
                        } else if(!empty($_GET['param']) && $_GET['param'] == "utilisateurs") {
                            include_once __DIR__ . "/utilisateurs.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "statuts") {
                            include_once __DIR__ . "/statuts.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "logiciels") {
                            include_once __DIR__ . "/typeslogiciels.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "materiels") {
                            include_once __DIR__ . "/typesmateriels.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "connexions") {
                            include_once __DIR__ . "/connexions.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "reseaux") {
                            include_once __DIR__ . "/reseaux.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "systemes") {
                            include_once __DIR__ . "/systemes.php";
                        } else if(!empty($_GET['param']) && $_GET['param'] == "particularites") {
                            include_once __DIR__ . "/particularites.php";
                        }
                        ?>
                    </div>                     
                </div>
                <?php require_once __DIR__ . "/../modules/footer.php";?>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script async="" src="chrome-extension://kmhkepipobnjllejbafajoemahjejdcm/scripts/instana/eum.min.js" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>