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

        <input type="text" name="Identifiant" id="identifiant" class="login" placeholder="Compte utilisateur" required>
        <p class="connexionError" id="idError">Veuillez insérer un identifiant valide !</p>
        <script src="js/emailCheck.js"></script>

        <input type="password" name="Mdp" id="mdp" class="mdp" placeholder="Mot de passe" required>
        <p class="connexionError" id="mdpError">Veuillez insérer un mot de passe !</p>
        <script src="js/mdpCheck.js"></script>

        <button type="submit" class="loginSubmit">S'indentifier</button>
        <hr>
        <a href="">Vous avez oublié votre mot de passe ?</a>

    </form>
</body>

</html>