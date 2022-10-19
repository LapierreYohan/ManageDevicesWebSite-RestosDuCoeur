<?php
$erreur = null;
$connectionsSucces = false;

require_once("./include/auth.php");
if (is_connected()) {
    header('Location: /pages/home.php');
    exit();
}  

if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
    $identity = htmlentities($_POST['identifiant']);
    $password = htmlentities($_POST['mdp']);

    require_once("./include/MariaDB.php");
    $bdd = bddRestos();
   
    $stmt = $bdd->prepare("SELECT * FROM Utilisateur WHERE Mail=\"$identity\" AND MotDePasse=\"$password\" LIMIT 1");
    $stmt->execute();

    $res = $stmt->fetchAll();

    foreach ( $res as $row ) {
        $connectionsSucces = true;
    }

    if ($connectionsSucces === false) {
        $stmt = $bdd->prepare("SELECT Nom FROM Utilisateur WHERE concat(lower(Nom), '.', lower(Prenom)) = lower(\"$identity\") AND MotDePasse=\"$password\" LIMIT 1");
        $stmt->execute();

        $res = $stmt->fetchAll();

        foreach ( $res as $row ) {
            $connectionsSucces = true;
        }
    }

    if ($connectionsSucces === false) {
        $erreur = true;
    } else {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["connected"] = 1;
        header('Location: /pages/home.php');
        exit();
    }
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

        <button type="submit" class="loginSubmit" name="submitConnect" id="submitConnect" disabled="false">S'indentifier</button>
        <hr>
        <a href="">Vous avez oublié votre mot de passe ?</a>

    </form>
</body>

</html>

<?php if ($erreur) : ?>
    <script type="text/javascript">
        let error = document.getElementById("connectError");
        error.style.display = "block";
    </script>
<?php endif ?>