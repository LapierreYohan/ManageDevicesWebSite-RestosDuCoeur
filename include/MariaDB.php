<?php

const DB = "p2103678";
const DBHOST = "iutbg-lamp.univ-lyon1.fr";
const DBPORT = 3306;
const DBUSER = "p2103678";
const DBPASSWORD = "12103678";

// const db = "resto";
// const dbhost = "localhost";
// const dbport = 3306;
// const dbuser = "p2103678";
// const dbpasswd = "12103678";

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

//?https://www.linuxtricks.fr/wiki/php-exemples-avec-pdo-pour-interroger-une-base-mariadb
//?https://www.w3schools.com/Php/php_mysql_create_table.asp

?>