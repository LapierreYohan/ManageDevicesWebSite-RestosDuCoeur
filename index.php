<?php
$erreur = null;
$connectionsSucces = false;

require_once(__DIR__ . "/includes/fonctions/auth.php");
if (is_connected()) {
    header('Location: /pages/home.php');
    exit();
}

if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
    $identity = htmlentities($_POST['identifiant']);
    $password = htmlentities($_POST['mdp']);

    require_once(__DIR__ . "/includes/MariaDB.php");
    $bdd = Connexion::getDB()->get();

    $stmt = $bdd->prepare("SELECT * FROM Utilisateur WHERE (Mail= ? OR concat(lower(Nom), '.', lower(Prenom)) = lower( ? )) AND MotDePasse= ? LIMIT 1");
    $stmt->execute([$identity, $identity, $password]);

    $res = $stmt->fetchAll();
    $nom;
    $prenom;
    $idUser;
    $admin = false;

    foreach ($res as $row) {
        $connectionsSucces = true;
        $idUser = $row['ID_User'];
        $nom = $row['Nom'];
        $prenom = $row['Prenom'];
        if ($row['Admin_User'] == true) {
            $admin = true;
        }
    }

    if ($connectionsSucces === false) {
        $erreur = true;
        unset($bdd);
    } else {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["H!g0h?s,BVDVo"] = 1;
        $_SESSION["ID_User"] = $idUser;
        $_SESSION["Prenom"] = $prenom;
        $_SESSION["Nom"] = $nom;
        $_SESSION["Admin"] = $admin;
        unset($bdd);
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
    <link rel="shortcut icon" href="/img/mainIcone.png">

    <link rel="stylesheet" href="/css/connexion.css">
</head>

<body>
    <img class="login" src="/img/login-background.png" alt="Enseigne des Restos du coeur">
    <form action="" method="POST" id="connexion">

        <p class="connexionError" id="connectError">Vos identifiants sont invalides...</p>

        <input type="text" name="identifiant" id="identifiant" class="login" placeholder="Compte utilisateur" required value="">
        <p class="connexionError" id="idError">Veuillez insérer un identifiant valide !</p>
        <script src="/js/emailCheck.js"></script>

        <input type="password" name="mdp" id="mdp" class="mdp" placeholder="Mot de passe" required value="">
        <p class="connexionError" id="mdpError">Veuillez insérer un mot de passe !</p>
        <script src="/js/mdpCheck.js"></script>

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