

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test</title>
    <link rel="shortcut icon" href="./img/mainIcone.png" >

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/test.css">
</head>

<body>
    
<h1>Délégations Régional</h1>
<br><br>

<!-- Flickity HTML init -->
<section id="dr">
    <div class="carousel" data-flickity='{ "groupCells": true, "wrapAround": true, "pageDots": false}'>

        <input type="radio" name="siSelector" id="DR-AIN">
        <div class="carousel-cell">
            <label for="DR-AIN">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation de L'Ain</p>
            </label>
        </div>
        
        <input type="radio" name="siSelector" id="DR-RHONE">
        <div class="carousel-cell">
            <label for="DR-RHONE">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation du Rhône</p>
            </label>
        </div>

        <input type="radio" name="siSelector" id="DR-AUVERGNE">
        <div class="carousel-cell">
            <label for="DR-AUVERGNE">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation de L'Auvergne</p>
            </label>
        </div>

        <input type="radio" name="siSelector" id="DR-NORMANDIE">
        <div class="carousel-cell">
            <label for="DR-NORMANDIE">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation de Normandie</p>
            </label>
        </div>

        <input type="radio" name="siSelector" id="DR-BRETAGNE">
        <div class="carousel-cell">
            <label for="DR-BRETAGNE">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation de Bretagne</p>
            </label>
        </div>

        <input type="radio" name="siSelector" id="DR-ARDECHE">
        <div class="carousel-cell">
            <label for="DR-ARDECHE">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation d'Ardèche</p>
            </label>
        </div>

        <input type="radio" name="siSelector" id="DR-JURA">
        <div class="carousel-cell">
            <label for="DR-JURA">
                <img src="../img/icon/Département.png" alt="">
                <p>Délégation du Jura</p>
            </label>
        </div>

    </div>
    <script src="../js/siteSelector.js"></script>
</section>

</body>

</html>