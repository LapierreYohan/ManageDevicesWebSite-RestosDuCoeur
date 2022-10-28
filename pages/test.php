<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test</title>
    <link rel="shortcut icon" href="/img/mainIcone.png">

    <link rel="stylesheet" href="/css/flickity.min.css">
    <link rel="stylesheet" href="/css/flickity.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/test.css">

</head>

<body>

    <h1>Délégations Régional</h1>
    <br><br>

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
                echo '<img src="../img/icon/Département.png" alt="">';
                echo '<p>' . $row["Reference"] . '</p>';
                echo '</label>';
                echo '</div>';
            }
            ?>

            <?php require_once __DIR__ . "/../include/changeDr.php" ?>
        </div>

    </section>

</body>

</html>