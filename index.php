<?php
$erreur = null;

if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
    $identity = htmlentities($_POST['identifiant']);
    $password = htmlentities($_POST['mdp']);

    if ($identity !== "lapierre.yohan" || $password !=="1234") {
        $erreur = true;
    } else {
        session_start();
        $_SESSION["connected"] = 1;
        header('Location: /pages/home.php');
        exit();
    }
} 

require_once("./include/auth.php");
if (is_connected()) {
    header('Location: /pages/home.php');
    exit();
}  
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>

    <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>
    <img class="login" src="./img/login-background.png" alt="Enseigne des Restos du coeur">
    <form action="" method="POST" id="connexion">

        <p class="connexionError" id="connectError">Vos identifiants sont invalides...</p>

        <input type="text" name="identifiant" id="identifiant" class="login" placeholder="Compte utilisateur" required value="">
        <p class="connexionError" id="idError">Veuillez insérer un identifiant valide !</p>
        <script src="js/emailCheck.js"></script>

        <input type="password" name="mdp" id="mdp" class="mdp" placeholder="Mot de passe" required value="">
        <p class="connexionError" id="mdpError">Veuillez insérer un mot de passe !</p>
        <script src="js/mdpCheck.js"></script>

        <button type="submit" class="loginSubmit" name="submitConnect" id="submitConnect" disabled="true">S'indentifier</button>
        <hr>
        <a href="">Vous avez oublié votre mot de passe ?</a>

    </form>
</body>

</html>

<?php if ($erreur) : ?>
    <script type="text/javascript">
        console.log("coucou")
        let error = document.getElementById("connectError");
        error.style.display = "block";
    </script>
<?php endif ?>