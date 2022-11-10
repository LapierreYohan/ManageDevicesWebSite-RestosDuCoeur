<?php
require_once("../include/fonctions/auth.php");
redirectUser();

//unset($_SESSION['H!g0h?s,BVDVo']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test</title>
    <link rel="shortcut icon" href="/img/mainIcone.png">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/flickity.min.css">
    <link rel="stylesheet" href="/css/flickity.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/test.css">

</head>

<body>
    
    <section id="app">
        <h5>Délégations Régionales</h5>
        <section id="dr">
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <?php
                require_once(__DIR__ . "/../include/MariaDB.php");
                
                $res;
                if ($_SESSION['Admin'] === true) {
                    $res = Connexion::getResult("SELECT * FROM Delegation_Regionale");
                } else {
                    $res = Connexion::getResult("SELECT * FROM Delegation_Regionale WHERE ID_Dr = ANY (SELECT ID_Dr FROM Administrer WHERE ID_User =" . $_SESSION['ID_User'] . ") OR ID_Dr = Any (SELECT ID_Dr FROM Gerer WHERE ID_User =" . $_SESSION['ID_User'] . ");");
                }
                
                Connexion::printCarouselElements($res, "drSelector");
                ?>

                <script src="/js/traitements/changeDr.js"></script>
            </div>
            <div class="toolBar">
                <?php if ($_SESSION['Admin'] === true) {  ?>
                    <a id="dr" href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
                <?php } ?>
                <a id="dr" href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
                <?php if ($_SESSION['Admin'] === true) {  ?>
                    <a id="dr" href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
                <?php } ?>
            </div>
        </section>

        <h5>Associations Départementales</h5>
        <section id="ad">
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing">Vide</h3>
                </div>
            </div>
            <div class="toolBar">
                <a id="ad" href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
                <a id="ad" href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
                <a id="ad" href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
            </div>

        </section>

        <h5>Unités Opérationelles</h5>
        <section id="uo">
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing">Vide</h3>
                </div>
            </div>
            <div class="toolBar">
                <a id="uo" href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
                <a id="uo"  href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
                <a id="uo"  href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
            </div>

        </section>

        <h5>Matériels</h5>
        <section id="ma">
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing">Vide</h3>
                </div>
            </div>
            <div class="toolBar">
                <a id="ma" href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
                <a id="ma" href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
                <a id="ma" href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
            </div>

        </section>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>