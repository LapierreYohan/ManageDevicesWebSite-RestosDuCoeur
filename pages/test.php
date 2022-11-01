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

    <!-- Flickity HTML init -->
    <section id="dr">
        <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
            <?php
            require_once(__DIR__ . "/../include/MariaDB.php");
            $bdd = bddRestos();

            $stmt = $bdd->query("SELECT * FROM Delegation_Regionale");
            $res = $stmt->fetchAll();

            foreach ($res as $row) {

                echo '<input type="radio" name="drSelector" id="' . $row["Reference"] . '">';
                echo '<div class="carousel-cell">';
                echo '<label for="' . $row["Reference"] . '">';
                echo '<img src="../img/icon/Département.png" alt="Icon Département">';
                echo '<p>' . $row["Reference"] . '</p>';
                echo '</label>';
                echo '</div>';
            }
            ?>

            <?php require_once __DIR__ . "/../include/changeDr.php" ?>
        </div>
        <div class="toolBar">
            <a href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
            <a href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
            <a href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
        </div>

    </section>

    <section id="ad">
        <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
            <div class="carousel-cell">
                <h3 class="nothing">Vide</h3>
            </div>
        </div>
        <div class="toolBar">
            <a href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
            <a href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
            <a href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
        </div>

    </section>

    <section id="uo">
        <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
            <div class="carousel-cell">
                <h3 class="nothing">Vide</h3>
            </div>
        </div>
        <div class="toolBar">
            <a href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
            <a href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
            <a href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
        </div>

    </section>

    <section id="ma">
        <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false}'>
            <div class="carousel-cell">
                <h3 class="nothing">Vide</h3>
            </div>
        </div>
        <div class="toolBar">
            <a href="" class="nav-link disabled"><h3 class="bi bi-plus-circle"></h3></a> 
            <a href="" class="nav-link disabled"><h3 class="bi bi-pencil-square"></h3></a>
            <a href="" class="nav-link disabled"><h3 class="bi bi-trash3"></h3></a>
        </div>

    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>