<?php

// const DB = "p2103678";
// const DBHOST = "iutbg-lamp.univ-lyon1.fr";
// const DBPORT = 3306;
// const DBUSER = "p2103678";
// const DBPASSWORD = "12103678";

const DB = "resto";
const DBHOST = "localhost";
const DBPORT = 3306;
const DBUSER = "p2103678";
const DBPASSWORD = "12103678";

function bddRestos(): PDO {
    $bdd = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DB . '', DBUSER, DBPASSWORD);
    $bdd->exec("SET CHARACTER SET utf8");
    return $bdd;
}

// $stmt = $bdd->prepare("SELECT * FROM Utilisateur");
// $stmt->execute();

// $res = $stmt->fetchAll();
// foreach ( $res as $row ) {
//     print_r($row);
// }

?>