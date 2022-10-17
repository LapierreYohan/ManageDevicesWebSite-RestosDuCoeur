<?php
//setcookie('utilisateur', "Galou", time() + 60 * 60 * 24); //*Ajouter
//unset($_COOKIE['utilisateur']); //!Supprimer
//setcookie('utilisateur', "", time() - 10); //!Supprimer
//var_dump($_COOKIE);

//!Si c'est trop gros serialize() et après unserialize()

//? Un setcookie n'est pas instantané, toujours définir manuellement le cookie $_COOKIE['utilisateur] = $_POST['utilisateur]

//session_start();
//$_SESSION

/**
 * ! Deconnexion de session
 * unset($_SESSION['connected']);
 * puis un header pour redirect
 * verifier si les sessions sont deja lancés
 */