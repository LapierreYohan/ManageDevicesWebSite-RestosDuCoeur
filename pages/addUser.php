<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>
    
    <title>Add Utilisateur</title>
</head>

<body>
    <?php require_once __DIR__ . "/../modules/header.php";?>
    
    <section class="container">
            <div class="border border-secondary border-3 rounded-4 bg bg-light" style="margin: 50px 10% 0 10%;">
                <form method="POST" action="/includes/traitements/insertUser.php" style="margin: 30px 5% 0 5%;">
                    <h4 class="mb-3">Informations</h4>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="ref">Ref <p style="color: red; display: inline;">*</p></label></span>
                            <input type="text" class="form-control" id="ref" name="ref" placeholder="Réference" maxlength="47" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="nom">Nom <p style="color: red; display: inline;">*</p></label></span>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><label for="prenom">Prénom <p style="color: red; display: inline;">*</p></label></span>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" maxlength="50" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="mdp">Mot De Passe <p style="color: red; display: inline;">*</p></label></span>
                            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="" autocomplete="new-password" required>
                            <a class="input-group-text"><i class="bi bi-eye-slash" id="togglePassword1"></i></a>
                        </div>
                    </div>

                    <script>
                        const togglePassword = document.querySelector('#togglePassword1');
                
                        const password = document.querySelector('#mdp');
                
                        togglePassword.addEventListener('click', () => {
                
                            // Toggle the type attribute using
                            // getAttribure() method
                            const type = password
                                .getAttribute('type') === 'password' ?
                                'text' : 'password';
                                
                            password.setAttribute('type', type);
                
                            // Toggle the eye and bi-eye icon
                            togglePassword.classList.toggle('bi-eye');
                        });
                    </script>

                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="mdpConfirm">Confirmer le Mot De Passe <p style="color: red; display: inline;">*</p></label></span>
                            <input type="password" class="form-control" id="mdpConfirm" name="mdpConfirm" placeholder="" autocomplete="new-password" required>
                            <a class="input-group-text"><i class="bi bi-eye-slash" id="togglePassword2"></i></a>
                        </div>
                    </div>

                    <script>
                        const togglePassword2 = document.querySelector('#togglePassword2');
                
                        const password2 = document.querySelector('#mdpConfirm');
                
                        togglePassword2.addEventListener('click', () => {
                
                            // Toggle the type attribute using
                            // getAttribure() method
                            const type = password2
                                .getAttribute('type') === 'password' ?
                                'text' : 'password';
                                
                                password2.setAttribute('type', type);
                
                            // Toggle the eye and bi-eye icon
                            togglePassword2.classList.toggle('bi-eye');
                        });
                    </script>

                    <div class="mb-4">
                        <span>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Administrateur </label>
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="admin">
                            </div>
                        </span>
                    </div>
        
                    <hr class="my-4">
                    <h4 class="mb-3">Commentaire</h4>
                    <div class="col mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><label for="com">Com</label></span>
                            <textarea class="form-control" id="com" name="com" style="height: 100px;"> </textarea>
                        </div>
                    </div>

                    <button class="w-35 btn btn-outline-success btn-lg mb-4" type="submit">Ajouter un Utilisateur</button>
                </form>
            </div>
        </section>
        </br></br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>