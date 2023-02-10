<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="/img/favicon.ico">
  
  <!-- CSS -->
  <link rel="stylesheet" href="/css/flickity.min.css">
  <link rel="stylesheet" href="/css/flickity.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <link rel="stylesheet" href="/css/home.css">

  <title>Accueil</title>
</head>

<body>
  <?php require_once __DIR__ . "/../modules/header.php";?>
    
    <div class="container px-4 py-3 bg-dark border-2 border-secondary rounded-3" style="margin-top: 3%;">
        <label for="noneDrSelected">
            <h2 class="pb-2 border-bottom border-secondary resetSelector">Délégations Régionales</h2>
        </label>
        <section id="dr">
        
            <div class="carousel bg-dark border-0" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <?php
                require_once(__DIR__ . "/../includes/MariaDB.php");
                
                $res;
                if ($_SESSION['Admin'] === true) {
                    $res = Connexion::getDB()->getResult("SELECT * FROM Delegation_Regionale WHERE Statut = TRUE ORDER BY Reference ASC");
                } else {
                    $res = Connexion::getDB()->getResult("SELECT * FROM Delegation_Regionale WHERE Statut = TRUE AND ID_Dr = ANY (SELECT ID_Dr FROM Administrer WHERE ID_User =" . $_SESSION['User']['ID_User'] . ") OR ID_Dr = Any (SELECT ID_Dr FROM Gerer WHERE ID_User =" . $_SESSION['User']['ID_User'] . ") ORDER BY Reference ASC;");
                }
                
                Connexion::getDB()->printCarouselElements($res, "drSelector");
                ?>
            </div>
            <div class="toolBarDr" id="toolBarDr">
                <?php if ($_SESSION['Admin'] === true) {  ?>
                    <a id="newDr" href="/pages/addSite.php" class="nav-link"><h3 class="bi bi-plus-circle" style="color: rgb(179, 173, 173);"></h3></a> 
                <?php } ?>
            </div>
        </section> 
    </div>
    <input type="radio" name="drSelector" id="noneDrSelected" style="display: none;">
    <script src="/js/traitements/changeDr.js"></script>

    <div class="container px-4 py-3 bg-dark border-2 border-secondary rounded-3" style="margin-top: 3%;">
        <label for="noneAdSelected">
            <h2 class="pb-2 border-bottom border-secondary resetSelector">Associations Départementales</h2>
        </label>
        <section id="ad">
            <div class="carousel bg-dark border-0" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing text-secondary">Vide</h3>
                </div>
            </div>
            <div class="toolBarAd" id="toolBarAd">
               
            </div>

        </section>
    </div>
    <input type="radio" name="adSelector" id="noneAdSelected" style="display: none;">
    <script src="/js/traitements/changeAd.js"></script>

    <div class="container px-4 py-3 bg-dark border-2 border-secondary rounded-3" style="margin-top: 3%;">
        <label for="noneUoSelected">
            <h2 class="pb-2 border-bottom border-secondary resetSelector">Unités Opérationelles</h2>
        </label>
        <section id="uo">
            <div class="carousel bg-dark border-0" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing text-secondary">Vide</h3>
                </div>
            </div>
            <div class="toolBarUo" id="toolBarUo">
                
            </div>

        </section>
    </div>
    <input type="radio" name="uoSelector" id="noneUoSelected" style="display: none;">
    <script src="/js/traitements/changeUo.js"></script>

    <div class="container px-4 py-3 bg-dark border-2 border-secondary rounded-3" style="margin-top: 3%;">
        <label for="noneMaSelected">
            <h2 class="pb-2 border-bottom border-secondary resetSelector">Matériels</h2>
        </label>
        <section id="ma">
            <div class="carousel bg-dark border-0" data-flickity='{ "groupCells": true, "pageDots": false}'>
                <div class="carousel-cell">
                    <h3 class="nothing text-secondary">Vide</h3>
                </div>
            </div>
            <div class="toolBarMa" id="toolBarMa">
                
            </div>

        </section>
    </div>
    <input type="radio" name="maSelector" id="noneMaSelected" style="display: none;">
    <script src="/js/traitements/changeMa.js"></script>

    <?php require_once __DIR__ . "/../modules/footer.php";?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>